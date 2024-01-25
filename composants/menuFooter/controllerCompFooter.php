<?php
class ControllerCompFooter{

	private $vue;
//pas besoin de modele ici

	public function __construct(VueCompFooter $vue){
		$this->vue = $vue;
	}

	
	public function exec(){
		$this->vue->affiche();
	}


}


?>
