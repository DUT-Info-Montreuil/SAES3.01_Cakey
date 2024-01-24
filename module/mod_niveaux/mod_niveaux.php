<?php


class ModNiveau{


	private $controller;
	private $action;

	public function __construct(){
		// $action = isset($_GET['action']) ? $_GET['action'] : 'afficherEnnemis';

		$vue = new VueNiveau();
		$modele = new ModeleNiveau();
		$this->controller = new ControllerNiveau($vue, $modele); 

		
		/* switch ($action) {
            case 'afficherEnnemis':
                break;
            default : break;
	    }
        $this->controller->getVue()->menuEnnemi(); */

        echo "bzigjnrzg";
		$this->controller->getVue()->trierNiveaux();
		$this->controller->afficherNiveaux();


    }
}


?>









