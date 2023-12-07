<?php
class ControllerCompMenu{

	private $vue;
//pas besoin de modele ici

	public function __construct(VueCompMenu $vue){
		$this->vue = new VueCompMenu();
	}

	
	public function exec(){
		$this->vue->affiche();
	}


}


?>
