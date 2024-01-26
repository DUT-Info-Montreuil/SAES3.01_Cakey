<?php


class ModUstensile{


	private $controller;
	private $action;

	public function __construct($sort){

		$vue = new VueUstensile();
		$modele = new ModeleUstensile($sort);
		$this->controller = new ControllerUstensile($vue, $modele); 



		$this->controller->getVue()->trierUstensiles();
		$this->controller->afficherUstensiles();


    }
}


?>










