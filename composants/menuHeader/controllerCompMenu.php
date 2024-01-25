<?php
class ControllerCompMenu{

	private $vue;
	private $modele;
//pas besoin de modele ici

	public function __construct(VueCompMenu $vue , ModeleCompMenu $modele){
		$this->vue = $vue;
		$this->modele = $modele;
	}

	
	public function exec(){
		$this->vue->affiche($this->modele->lienPathPhotoProfil());
	}


}


?>
