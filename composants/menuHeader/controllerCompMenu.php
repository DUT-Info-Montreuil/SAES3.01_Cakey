<?php
class ControllerCompMenu{

	private $vue;
//pas besoin de modele ici

	public function __construct(VueCompMenu $vue){
		$this->vue = $vue;
	}

	
	public function exec(){
		$this->vue->affiche();
	}


}


?>