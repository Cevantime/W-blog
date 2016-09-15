<?php

namespace Controller;

use Controller\BaseController;
use \Model\ArticlesModel;

class ArticleController extends BaseController {

	/**
	 * Page d'accueil par défaut
	 */
	public function home() {
		$this->show('article/home');
	}

	/**
	 * Affiche le contenu d'un article
	 * @param type $id l'id de l'article à afficher
	 */
	public function see($id) {
		$this->loadHelper('date');

		/*
		 * On va récupérer un article, on charge le model approprié.
		 */
		$articleModel = new ArticlesModel();

		/*
		 * on va chercher l'article qui correspond à l'id
		 */
		$article = $articleModel->find($id);
		
		/*
		 * Si aucun article ne correspond à l'id, on renvoie vers la page d'accueil 
		 * avec une belle erreur
		 */
		if (!$article) {
			$this->getFlashMessenger()->error('L\'article n\'existe pas');
			$this->redirectToRoute('home');
		}
		
		/*
		 * Si tout va bien, on affiche l'article
		 */
		$this->show('article/post', array('article' => $article));
	}
	
	/**
	 * Cette fonction permet d'afficher une vue partielle contenant un certain nombre 
	 * d'articles triés par date d'ajout décroissant. Elle est utilisée dans les
	 * requêtes ajax.
	 * @param type $offset on démarre la récupération à partir du offsetième article
	 * @param type $limit on récupère limit articles
	 */
	public function partial($offset, $limit = 5) {
		
		// on vérifier qu'il s'agit bien d'une requête ajax
		if(!$this->isAjax()) {
			$this->showForbidden();
		}
		
		$this->loadHelper('date');
		$offset = intval($offset);
		$limit = intval($limit);
		/*
		 * On s'apprête à aller chercher une liste d'articles,
		 * on fait donc appel au modèle d'article
		 */
		$articleModel = new ArticlesModel();

		/*
		 * On récupère offset éléments à partir de l'élément offset * indexième
		 */
		$articles = $articleModel->findAll('date_add', 'DESC', $limit, $offset);

		/*
		 * Affichage de la vue partielle
		 */
		$this->show('includes/articles', array('articles' => $articles));
	}
	
	/**
	 * Utilisée par typehead pour obtenir la liste des articles sous la forme
	 * d'un json
	 */
	public function allJson() {
		
		/*
		 * On s'apprête à aller chercher une liste d'articles,
		 * on fait donc appel au modèle d'article
		 */
		$articleModel = new ArticlesModel();
		
		// on récupère tous les articles
		$articles = $articleModel->findAll();
		
		$this->showJson($articles);
		
	}

}
