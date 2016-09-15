<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;

use \W\Controller\Controller;
/**
 * Description of BaseController
 * Controlleur intermédiaire permettant d'ajouter quelques fonctionnalités
 * utilisées dans le site à celle déjà présentes : l'inclusion d'un helper,
 * l'ajout de data au layout qui viendront s'ajouter à celles passées en paramètre
 * dans la fonction show et obtention facilitée d'une instance du FalshMessenger
 * pour insulter l'utilisateur plus facilement.
 * @author cevantime
 */
class BaseController extends Controller {
	
	/**
	 * Gestionnaire de messages plasticbrain
	 */
	protected $_fmsg;
	
	protected $_suppDatas = array();
	
	public function __construct() {
		
		/*
		 * on inclut le helper baseUrl car celui-ci est omniprésent dans les vues.
		 */
		$this->loadHelper('baseUrl');
		
		/*
		 * le flashmessagemessenger est également utilisé constamment.
		 * On l'ajoute donc à toutes nos vues
		 */
		$this->_fmsg = new \Plasticbrain\FlashMessages\FlashMessages();
		$this->addDatasToLayout(array('fmsg'=>  $this->_fmsg));
	}
	/*
	 * Surcharge de la méthode show de façon à inclure les datas supplémentaires
	 * ajoutées lors de l'appel de la méthode addDatasToLayout
	 */
	public function show($file, array $data = array()) {
		$data = array_merge($data, $this->_suppDatas);
		parent::show($file, $data);
	}
	
	/**
	 * Ajoute des datas supplémentaires qui seront ajoutées à la vue
	 * @param array $data tableau de donnée (même usage que dans la méthode show)
	 */
	public function addDatasToLayout($data) {
		$this->_suppDatas = array_merge($this->_suppDatas,$data);
	}
	
	/**
	 * Méthode de raccourci pour obtenir le flashmessenger
	 * @return \Plasticbrain\FlashMessages\FlashMessages
	 */
	public function getFlashMessenger() {
		return $this->_fmsg;
	}
	
	/**
	 * Permettant de charger un helper par son nom
	 * @param string $helper
	 */
	public function loadHelper($helper) {
		require_once realpath('').'/../app/Helper/'.$helper.'.php';
	}
	
	/**
	 * Permet de vérifier si la requête est de type ajax
	 */
	public function isAjax() {
		/* AJAX check  */
		return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
			
	}
}
