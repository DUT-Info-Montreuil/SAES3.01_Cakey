<?php
require_once "modele_classement.php";
require_once "vue_classement.php";
class ControleurClassement {
	private $modele;
	private $vue;
	private $action;
	private $choix;
	
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
			case "niveau":
				$this->niveau();
				break;
			case "niveau1" :
			
				$this->niveau1();
				break;
			case "niveau2" :
		
				$this->niveau2();
		
				break;
			default : 
				die ("Action inexistante");
			
		
		}
	}
	
	private function general () {
		$liste =$this->modele->get_liste();
		$this->vue->menu();
      	$this->vue->tab($liste);
	   //$this->modele->get_liste1();

	
	}
	
	private function niveau () {
		$this->vue->menu();
		$this->vue-> formNiveau();
		$listeNiveau=$this->modele->get_listeNiveau();
		$this->vue->selectionnerNiveau($listeNiveau);	
	}

	private function niveau1 () {
		$this->vue->menu();
		$this->vue-> formNiveau();
		$liste =$this->modele-> get_listeParNiveau1(2) ;
		$this->vue->get_tableauParNiveau($liste);
	}

	private function niveau2() {
		$this->vue->menu();
		$this->vue-> formNiveau();
		$liste= $this->modele-> get_listeParNiveauTemps(1);
		$this->vue->get_tableauParNiveauTps($liste);
			
		}


	

}
