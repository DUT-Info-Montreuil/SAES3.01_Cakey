<?php


class ModEnnemi{


	private $controller;
	private $action;

	public function __construct(){
		// $action = isset($_GET['action']) ? $_GET['action'] : 'afficherEnnemis';

		$vue = new VueEnnemi();
		$modele = new ModeleEnnemi();
		$this->controller = new ControllerEnnemi($vue, $modele); 

		
		/* switch ($action) {
            case 'afficherEnnemis':
                break;
            default : break;
	    }
        $this->controller->getVue()->menuEnnemi(); */

		$this->controller->getVue()->trierEnnemis();
		$this->controller->afficherEnnemis();


    }
}


?>









