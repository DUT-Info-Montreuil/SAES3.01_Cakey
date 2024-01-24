<?php


class ModUstensile{


	private $controller;
	private $action;

	public function __construct(){
		// $action = isset($_GET['action']) ? $_GET['action'] : 'afficherEnnemis';

		$vue = new VueUstensile();
		$modele = new ModeleUstensile();
		$this->controller = new ControllerUstensile($vue, $modele); 

		
		/* switch ($action) {
            case 'afficherEnnemis':
                break;
            default : break;
	    }
        $this->controller->getVue()->menuEnnemi(); */

        echo "bzigjnrzg";
		$this->controller->getVue()->trierUstensiles();
		$this->controller->afficherUstensiles();


    }
}


?>









