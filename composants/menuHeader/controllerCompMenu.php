<?php
class ControllerCompMenu{

	private $vue;
	private $modele;
 
	public function __construct(VueCompMenu $vue , ModeleCompMenu $modele){
		$this->vue = $vue;
		$this->modele = $modele;
 	}

	
	public function exec(){
		$this->vue->affiche($this->modele->lienPathPhotoProfil());
	}


}


?>
