<?php


class ModNiveau{


	private $controller;
	private $action;

	public function __construct($sort){

		$vue = new VueNiveau();
		$modele = new ModeleNiveau($sort);
		$this->controller = new ControllerNiveau($vue, $modele); 

		$this->controller->getVue()->trierNiveaux();
		$this->controller->afficherNiveaux();


    }
}


?>









