<?php

namespace Controller;

use Controller\BaseController;
use Model\ArticlesModel;

class DefaultController extends BaseController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		// le helper de date nous sera utile dans la vue
		$this->loadHelper('date');
		
		$this->show('default/home');
	}

}