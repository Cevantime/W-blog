W-Blog
===================
Ce projet a été réalisé dans le cadre d'un projet demandé à mon arrivée chez Webforce dont les consignes étaient les suivantes :
 Doit contenir une partie backend et une partie frontend


La partie frontend doit être responsive

 - La partie frontend doit contenir une bibliothèque javascript d'autocomplétion
 - La partie frontend peut contenir des animations css et des chargements ajax (en bonus)
 - La partie frontend doit contenir une fonctionnalité de recherche dans laquelle le mot recherché est surligné
 - La partie backend doit n'être accessible que par les administrateurs
 - La partie backend doit être en mesure, à partir d'un fichier Json contenant des articles, d'insérer ces articles en base de donnée.

----------

Installation
---------------
  - Attention à bien exécuter *composer install* avant de démarrer le projet.
  - Créer une base de donnée sur votre serveur mysql appelée *wblog* et y importer le fichier init.sql qui se trouve à la racine du projet.
  - Copier le fichier *config.dist.php* dans *config.php* et remplacer le code de **config.php** par le code suivant :

      <?php 
      $w_config = [
           	//information de connexion à la bdd
        	'db_host' => 'localhost',						//hôte (ip, domaine) de la bdd
            'db_user' => 'root',							//nom d'utilisateur pour la bdd
            'db_pass' => '',								//mot de passe de la bdd
            'db_name' => 'wblog',								//nom de la bdd
            'db_table_prefix' => '',						//préfixe ajouté aux noms de table
        
        	//authentification, autorisation
        	'security_user_table' => 'users',				//nom de la table contenant les infos des utilisateurs
        	'security_id_property' => 'id',					//nom de la colonne pour la clef primaire
        	'security_username_property' => 'username',		//nom de la colonne pour le "pseudo"
        	'security_email_property' => 'email',			//nom de la colonne pour l'"email"
        	'security_password_property' => 'password',		//nom de la colonne pour le "mot de passe"
        	'security_role_property' => 'role',				//nom de la colonne pour le "role"
        
        	'security_login_route_name' => 'login',			//nom de la route affichant le formulaire de connexion,
        	'number_of_element_per_page' => 10
        ];
        require('routes.php');


Dépendances
------------------
Le projet utilise deux dépendances en plus des dépendances de base du framework (voir le fichier composer.json) :

- La dépendance *plasticbrain/php-flash-messages* qui permet de gérer facilement les messages flash
- La dépendance *respect/validation* qui permet de rendre plus robuste et plus propre la validation des formulaires.

**Attention ! Ces dépendances ne sont absolument pas obligatoires !**

Points intéressants pour d'éventuels étudiants en cours de projet ;) 
------------------

En plus de respecter au maximum les conventions du framework W, le projet compte deux particularités intéressantes : 

 1. La première est la classe BaseController qui a été placée dans le dossier app/Controller et qui sert d'intermédiaire entre vos controlleurs (DefaultController, UserController, etc.) et la classe Controller de base. Celle-ci sert à rajouter des méthodes dans votre controlleurs telles que :
	 - **addDatasToLayout** qui permet d'assigner des données à la vue en plus de celles qui seront assignées dans la méthode *show*.
	 - **getFlashMessenger** qui va mettre à disposition le gestionnaire de messages flash dans les vues
	 - **loadHelper** qui permet de charger un helper dans la vue (cf 2.)
	 - **isAjax** qui permet de savoir si on est dans une requête Ajax.
 2. Introduction des Helpers : Possibilité de charger des fichiers (appelés *helpers*) qui contiennent des fonctions utiles à mes controlleurs et à mes vues. Vous n'êtes pas obligés de les utiliser.

Je vous laisse regarder un peu le code et le confronter à ce que vous connaissez déjà !