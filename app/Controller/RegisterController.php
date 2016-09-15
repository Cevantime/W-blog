<?php

namespace Controller;

use Controller\BaseController;
use \W\Model\UsersModel;
use \Respect\Validation\Validator as v;
use W\Security\AuthentificationModel;

class RegisterController extends BaseController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function form()
	{
		// on crée notre tableau d'erreur qui nous servira à la fois à 
		// valider le formulaire et à envoyer les messages d'erreur à la vue
		$datas = array();
		
		if($_POST) {
			// Si la requête est un post, on commence par rendre filtrer les données
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			// il nous sera utile d'instancier le modèle user pour les vérifications
			// et la sauvegarde en bdd de notre nouveau user
			$userModel = new UsersModel();
			v::with('Validation\\Rules\\', true);
			// on utilise le validateur respect/validation pour plus de simplicité
			$validators = array(
				'username' => v::usernameNotExists()
					->alnum()
					->notEmpty()
					->length(2,50)
					->noWhitespace()
					->setName("Nom d'utilisateur"),
				'email' => v::emailNotExists()
					->email()
					->notEmpty()
					->setName("Email"),
				'password' => v::notEmpty()
					->length(2,30)
					->noWhitespace()
					->setName("Mot de passe"),
				'passwordconfirm' => v::notEmpty()
					->matchField('password')
					->setName("Confirmation du mot de passe")
			);
			
			foreach($validators as $field => $validator) {
				try{
					$validator->check($post[$field]);
				} catch (\Respect\Validation\Exceptions\ValidationException $ex) {
					$this->getFlashMessenger()->error($ex->getMainMessage());
				}
			}
			if(!$this->getFlashMessenger()->hasErrors()) {
				// si pas d'erreur on stocke le nouvel utilisateur en bdd
				// mais d'abord, on évite de stocker les données en clair
				// on utilise le modèle d'authentification pour hasher le mot 
				// de passe
				$auth = new AuthentificationModel();
				$post['password'] = $auth->hashPassword($post['password']);
				
				/*
				 * On souhaite s'assurer que seules les colonnes propres au modèle
				 * sont présentes
				 */
				$post = array_intersect_key($post, array_flip(array('email','username','password')));
				/*
				 * Insertion de l'utilisateur
				 */
				$userModel->insert($post);
				
				/*
				 * On confirme à l'utilisteur son inscription. C'est la moindre 
				 * des choses pour quelqu'un qui vient de nous filer son email.
				 */
				$this->getFlashMessenger()->success(
					'Vous vous êtes bien inscrit. Connectez-vous dès à présent.'
				);
				
				/*
				 * Allez maintenant direction le formulaire de connection
				 */
				$this->redirectToRoute('login');
			}
			
			$datas = $post;
		}
		
		$this->show('register/form', array('datas'=>$datas));
	}
	
}