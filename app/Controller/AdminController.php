<?php

namespace Controller;

use Controller\BaseController;
use \Respect\Validation\Validator as v;
use \Model\ArticlesModel;

class AdminController extends BaseController {

	public function __construct() {
		parent::__construct();
		// le backoffice est réservé aux admins et aux superadmins
		$this->allowTo(array('admin', 'superadmin'));
	}
	/**
	 * Page permettant de récupérer les articles paginés
	 * @param int $index index de la page
	 */
	public function all($index = 0) {
		/*
		 * Les helpers de pagination et de date nous seront utiles dans les vues,
		 * on les charge dès maintenant
		 */
		$this->loadHelper('pagination');
		$this->loadHelper('date');

		/*
		 * On s'apprête à aller chercher une liste d'articles,
		 * on fait donc appel au modèle d'article
		 */
		$articleModel = new ArticlesModel();

		/*
		 * On va avoir besoin du nombre d'éléments par page défini dans config.php
		 * pour paginer notre résultat
		 */
		$offset = getApp()->getConfig('number_of_element_per_page');

		/*
		 * On récupère offset éléments à partir de l'élément offset * indexième
		 */
		$articles = $articleModel->findAll('date_add', 'DESC', $offset, $offset * $index);

		/*
		 * Pour notre pagination, on aura aussi besoin du nombre d'éléments total
		 */
		$articlesCount = $articleModel->countAll();

		$this->show('admin/all', array('articles' => $articles, 'index' => $index, 'articlesCount' => $articlesCount));
	}
	/**
	 * Page permettant de chercher un titre d'article par une recherche d'un mot 
	 * clé en post
	 */
	public function search() {
		
		/*
		 * Le helper date nous sera utile
		 */
		$this->loadHelper('date');

		/*
		 * Si la requête est un post et que search existe bien sans être null
		 */
		if (isset($_POST) && isset($_POST['search'])) {
			
			/*
			 * si on n'a pas de search ou que search n'est pas une chaîne
			 * on insulte l'utilisateur et on affiche la liste paginée des articles
			 */
			if(!$_POST['search'] || !is_string('search')) {
				$this->getFlashMessenger()->error('La recherche est invalide');
				return $this->all();
			}
			
			/*
			 * Sinon, on nettoie un peu le search
			 */
			$search = filter_input(INPUT_POST, 'search');
			
			/*
			 * Si la recherche fait 2 caraxtères ou moins, on insulte l'utilisateur
			 * et on affiche la liste paginée des articles
			 */
			if(strlen($search)< 3) {
				$this->getFlashMessenger()->error('La recherche doit comporter au moins 3 caractères.');
				return $this->all();
			}
			/*
			 * On s'apprête à aller chercher une liste d'articles,
			 * on fait donc appel au modèle d'article
			 */
			$articleModel = new ArticlesModel();

			/*
			 * On cherche les articles dont le titre correspond à celui posté
			 */
			$articles = $articleModel->search(array('title' => $search));
			
			$this->show('admin/search', array('articles' => $articles, 'search' => $search));
		} else {
			/*
			 * Si search n'a pas été posté, on affiche la liste paginée
			 */
			$this->all();
		}
	}

	/**
	 * Page d'accueil par défaut
	 */
	public function home() {
		/*
		 * L'action home redirige vers l'action d'ajout
		 */
		$this->add();
	}

	/**
	 * Page permettant de lire un article depuis l'admin
	 * @param type $id id de l'article en question
	 */
	public function see($id) {
		// on va utiliser le helper de date
		$this->loadHelper('date');
		/*
		 * On s'apprête à aller cherche un article en bdd,
		 * on fait donc appel au modèle d'article
		 */
		$articleModel = new ArticlesModel();

		// On récupère l'article grâce à l'id
		$article = $articleModel->find($id);

		$this->show('admin/see', array('article' => $article));
	}

	public function add() {
		/*
		 * On vérifie :
		 * - Qu'un fichier a bien été envoyé
		 * - Que le fichier a bien pour nom "json"
		 * - Que ce fichier a bien été uploadé dans le répertoire temporaire
		 */
		if ($_FILES && isset($_FILES['json']) && $_FILES['json']['tmp_name']) {

			// On récupère le contenu de notre json sans avoir besoin de le déplacer
			$jsonContent = file_get_contents($_FILES['json']['tmp_name']);

			/*
			 * on utilise le validateur respect/validation pour vérifier que
			 * le contenu du fichier est un json valide
			 */

			$isJson = v::json()->validate($jsonContent);

			/*
			 * Si c'est le cas, on poursuit le traitement
			 */
			if ($isJson) {
				/*
				 * On convertit le json en tableau/objet PHP
				 */
				$json = json_decode($jsonContent);

				/*
				 * Pour se simplifier la vie, on souhaite travailler un seul type
				 * de structure. On choisit ici le tableau
				 */
				$json = (array) $json;

				/*
				 * Encore pour se simplifier la vie, on utilise respect/validation
				 * pour vérifier chacun des éléments de notre json. Chaque article
				 * devra vérifier les conditions précisées dans le tableau de
				 * valiation
				 */
				$validators = array(
					'id' => v::notEmpty()
							->intType()
							->positive()
							->setName('Id'),
					'content' => v::notEmpty()
							->length(10)
							->setName("Contenu"),
					'title' => v::notEmpty()
							->length(5, 100)
							->setName("Titre"),
					'date_add' => v::notEmpty()
							// vérification du format de la date
							->regex('/\d{4}\-\d{2}\-\d{2} \d{2}:\d{2}:\d{2}/')
							->setName('Date d \'ajout'),
					'author' => v:: notEmpty()
							->length(3, 100)
							->setName('Nom de l\'auteur')
				);

				/*
				 * On s'apprête à insérer des articles en bdd, on fait donc 
				 * appel au modèle d'article
				 */
				$articleModel = new ArticlesModel();

				/*
				 * on fait subir la même validation à chaque article
				 */
				foreach ($json as $key => $article) {
					/*
					 * On applique chacun des validateurs de notre tableau à 
					 * chacun des articles
					 */
					foreach ($validators as $field => $validator) {
						try {

							/*
							 * On veut que nos messages d'erreur soient en mesure
							 * de préciser sur quel article les erreurs ont été
							 * rencontrées. On change donc à la volée le nom 
							 * du validateur pour chaque article
							 */
							$validatorName = $validator->getName();
							$validator->setName($validatorName . ' de l\'article ' . ($key + 1));

							/*
							 * Le vérification en elle-même est ici
							 */
							$content = isset($article->$field) ? $article->$field : '';
							$validator->check($content);

							/*
							 * On réinitialise le nom du validateur pour éviter 
							 * que ce nom ne s'allonge indéfiniment pour chaque 
							 * erreur
							 */
							$validator->setName($validatorName);
						} catch (\Respect\Validation\Exceptions\ValidationException $ex) {

							/*
							 * En cas d'erreur, on l'ajoute au messages flash
							 */
							$this->getFlashMessenger()->error($ex->getMainMessage());
						}
					}
				}
				/*
				 * Si il n'y a aucune erreur ie si tous les articles sont
				 * valides, on les insère un à un (pas le meilleur point de vue
				 * perf mais bon :) )
				 */
				if (!$this->getFlashMessenger()->hasErrors()) {
					foreach ($json as $article) {

						// On s'assure qu'on travaille bien sur un tableau
						$article = (array) $article;

						/*
						 * Cette petite ligne nous permet d'être sûr que notre
						 * article contient les bonnes colonnes et uniquement
						 * celles-ci.
						 */
						$article = array_intersect_key($article, array_flip(array('id', 'content', 'title', 'date_add', 'author')));

						/*
						 * Pour des raisons personnelles, je préfère stocker des
						 * timestamp plutôt que des dates, j'effectue la 
						 * conversion à la volée
						 */
						$article['date_add'] = strtotime($article['date_add']);

						// Il ne me reste plus qu'à insérer l'article en bdd
						$articleModel->insert($article, true);
					}

					// Un petit message de succès pour finir :)
					$many = count($json) > 1 ? 's' : '';
					$this->getFlashMessenger()->success('Article' . $many . ' ajouté' . $many);
				}
			} else {
				$this->getFlashMessenger()->error('Le fichier inclus n\'est pas un Json');
			}
		}

		$this->show('admin/home');
	}

}
