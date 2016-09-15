<?php

namespace Controller;

use Controller\BaseController;
use \W\Security\AuthentificationModel;

class LoginController extends BaseController {

	/**
	 * Formulaire de connection
	 */
	public function form() {
		$datas = array();
		
		if ($_POST && isset($_POST['password'],$_POST['username'])) {
			
			// Si la requête est un post, on commence par rendre filtrer les données
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			
			//on va utiliser le modèle d'authentification pour vérifier les infos
			// de connexion
			$auth = new AuthentificationModel();
			
			$userModel = new \W\Model\UsersModel();
			
			if($userId = $auth->isValidLoginInfo($post['username'], $post['password'])) {
				// si les informations sont correctes, on connecte le user
				$auth->logUserIn($userModel->find($userId));
				
				// petit message de succès
				$this->getFlashMessenger()->success('Vous êtes connecté');
				$this->redirect('home');
			} else {
				// sinon l'un des deux champs est invalide
				$this->getFlashMessenger()->error('Les données de connexion sont invalides');
			}
			
			/*
			 * on souhaite repeupler les données afin de ne pas rendre fou l'utilisateur
			 */
			$datas = $post;
		}
		$this->show('login/form', array('datas' => $datas));
	}

}
