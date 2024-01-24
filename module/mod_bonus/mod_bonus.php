<?php


class ModBonus{


	private $controller;
	private $action;

	public function __construct(){
		// $action = isset($_GET['action']) ? $_GET['action'] : 'afficherEnnemis';

		$vue = new VueBonus();
		$modele = new ModeleBonus();
		$this->controller = new ControllerBonus($vue, $modele); 

		
		/* switch ($action) {
            case 'afficherEnnemis':
                break;
            default : break;
	    }
        $this->controller->getVue()->menuEnnemi(); */

		$this->controller->getVue()->trierBonus();
		$this->controller->afficherBonus();


    }
}


?>









