<?php
require_once "modele_classement.php";
require_once "vue_classement.php";
class ControleurClassement {
	private $modele;
	private $vue;
	private $action;
	
	public function __construct() {
		$this->modele = new ModeleClassement();
		$this->vue = new VueClassement();
	}
	
	public function exec() {
		$this->action = isset($_GET["action"]) ? $_GET["action"] : "general";
		
		switch ($this->action) {
			case "general" :
				$this->general();
				break;
			case "niveau" :
				$this->niveau();
				break;
			default : 
				die ("Action inexistante");
			
		}
	}
	
	private function general () {
		$this->vue->menu();
		$this->vue->get_tableauGeneral();
	
	}
	
	private function niveau () {
		$this->vue->menu();
        $this->vue->get_tableauParNiveau();
		
	}
	

}
