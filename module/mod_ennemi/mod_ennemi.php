<?php


class ModEnnemi{


	private $controller;
	private $action;

	public function __construct(){
		$action = isset($_GET['action']) ? $_GET['action'] : 'bienvenue';

		$vue = new VueEnnemi();
		$modele = new ModeleEnnemi();
		$this->controller = new ControllerEnnemi($vue, $modele); 

		
		switch ($action) {
			case 'bienvenue':
				$this->controller->bienvenue();
				break;
            case 'modUstensile':
                include_once './module/mod_ustensile/mod_ustensile.php';
                $module = new ModUstensile;
                break;
            case 'modBonus' :
                include_once './module/mod_bonus/mod_bonus.php';
                $module = new ModBonus;
                break;
            case 'modClassement' :
                include_once './module/mod_classement/mod_classement.php';
                $module = new ModClassement;
                break;
            case 'modNiveaux' :
                include_once './module/mod_niveaux/mod_niveaux.php';
                $module = new ModNiveaux;
                break;
            case 'modProfil' : 
                include_once './module/mod_profil/mod_profil.php';
                $module = new ModProfil;
                break;
            case 'modUnivers' :
                include_once './module/mod_univers/mod_univers.php';
                $module = new ModUnivers;
                break;
            case 'modConnexion':
                include_once './module/mod_connexion/mod_connexion.php';
                $module = new ModConnexion;
                break;
            default : break;

		$this->controller->getVue()->menuEquipes();
	    }
    }
}


?>









