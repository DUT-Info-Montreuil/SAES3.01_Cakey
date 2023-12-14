<?php
require_once "cont_connexion.php";

class ModConnexion {
	
	private $title;
	private $controleur;
	
	public function __construct () {
		$this->title = "";
		$this->controleur = new ControleurConnexion();
	}
	
	public function exec () {
		$this->controleur->exec();
	}


}
