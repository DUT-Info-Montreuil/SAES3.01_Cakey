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
            case 'afficherEnnemis':
                $this->controller->afficherEnnemis();
                break;
            default : break;
	    }
        $this->controller->getVue()->menuEnnemi();

    }
}


?>









