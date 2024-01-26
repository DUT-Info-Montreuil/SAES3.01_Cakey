<?php
require_once "cont_classement.php";

class ModClassement {
	
	private $title;
	private $controleur;
	
	public function __construct () {
		$this->title = "";
		$this->controleur = new ControleurClassement();
		$this->exec();

	}
	
	public function exec () {
		$this->controleur->exec();
	}


}