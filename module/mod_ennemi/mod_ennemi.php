<?php

class ModEnnemi{

	private $controller;
	private $action;

	public function __construct($sort){

		$vue = new VueEnnemi();
		$modele = new ModeleEnnemi();
		$this->controller = new ControllerEnnemi($vue, $modele); 

	

		$this->controller->getVue()->trierEnnemis();
		$this->controller->afficherEnnemis();
	}
}

?>






