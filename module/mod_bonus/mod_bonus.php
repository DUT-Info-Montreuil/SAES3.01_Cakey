<?php


class ModBonus{


	private $controller;
	private $action;

	public function __construct($sort){

		$vue = new VueBonus();
		$modele = new ModeleBonus($sort);
		$this->controller = new ControllerBonus($vue, $modele); 

		$this->controller->getVue()->trierBonus();
		$this->controller->afficherBonus();


    }
}


?>









