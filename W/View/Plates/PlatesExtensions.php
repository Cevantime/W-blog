<?php

namespace W\View\Plates;

use League\Plates\Engine;
use League\Plates\Extension\ExtensionInterface;

/**
 * @link http://platesphp.com/engine/extensions/ Documentation Plates
 */
class PlatesExtensions implements ExtensionInterface
{

	/**
	 * Enregistre les nouvelles fonctions dans Plates
     * @param \League\Plates\Engine $engine L'instance du moteur de template
	 */
    public function register(Engine $engine)
    {
        $engine->registerFunction('assetUrl', [$this, 'assetUrl']);
        $engine->registerFunction('url', [$this, 'generateUrl']);
        $engine->registerFunction('isConnected', [$this, 'isConnected']);
        $engine->registerFunction('isAllowed', [$this, 'isAllowed']);
        $engine->registerFunction('getUser', [$this, 'getUser']);
    }

    /**
     * Retourne l'URL relative d'un asset
     * @param string $path Le chemin vers le fichier, relatif à public/assets/
     * @return string L'URL relative vers le fichier
     */
    public function assetUrl($path)
    {
        $app = getApp();
        return $app->getBasePath() . '/assets/' . ltrim($path, '/');
    }

    /**
     * Génère l'URL correspondant à une route nommée (copie de celle dans \W\Controller\Controller)
     * @param string $routeName Le nom de route
     * @param mixed  $params    Tableau de paramètres optionnel de cette route
     * @param boolean $absolute Retourne une url absolue si true (relative si false)
     * @return L'URL correspondant à la route
     */
    public function generateUrl($routeName, $params = array(), $absolute = false)
    {
    	return \W\Controller\Controller::generateUrl($routeName, $params, $absolute);
    }
	
	public function isConnected() {
		$auth = new \W\Security\AuthentificationModel();
		return $auth->getLoggedUser();
	}
	
	public function isAllowed($roles) {
		if (!is_array($roles)){
			$roles = [$roles];
		}
		$authorizationModel = new \W\Security\AuthorizationModel();
		foreach($roles as $role){
			if ($authorizationModel->isGranted($role)){
				return true;
			}
		}
		return false;
	}
	
	public function getUser() {
		return $this->isConnected();
	}
	
}
