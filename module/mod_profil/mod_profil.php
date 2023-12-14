<?php
require_once "module/mod_profil/cont_profil.php";


class ModProfil{
	private $title;
	private $controleur;
	
	public function __construct () {
		$this->title = "";
		$this->controleur = new ControleuProfil();
	}
	
	public function exec () {
		$this->controleur->exec();
	}



}
