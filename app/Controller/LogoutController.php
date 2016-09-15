<?php

namespace Controller;

use Controller\BaseController;

class LogoutController extends BaseController {

	/**
	 * Action de déconnection. Basique, elle déconnecte l'utilisateur 
	 * et le ramène à l'accueil
	 */
	public function index() {
		$auth = new \W\Security\AuthentificationModel();
		
		$auth->logUserOut();
		
		$this->getFlashMessenger()->success('Vous vous êtes déconnecté');
		$this->redirectToRoute('default_home2');
	}

}
