<?php

class ModEnnemi{

	private $controller;
	private $action;
	
	public function __construct($sort){
		$vue = new VueEnnemi();
		$modele = new ModeleEnnemi($sort);
		$this->controller = new ControllerEnnemi($vue, $modele);
		
		$this->controller->getVue()->trierEnnemis();
		$this->controller->afficherEnnemis();
	}
}

?>






