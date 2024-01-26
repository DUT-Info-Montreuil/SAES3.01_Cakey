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
		$this->vue->menu();
		switch ($this->action) {
			case "general" :
				$this->general();
				break;
			case "niveau":
				$this->niveau();
				break;
			case "niveausel" :
				$this->niveau();
				$this->sel();
				break;
			case "niveauselPerso" :
				$this->persNiveau();
				$this->selPerso();
				break;
			case "perso" :
				$this->vue->menuPerso();
				break;
	
			case "notPerso" :
				$this->vue->menunotPerso();
				break;	
			case "generalPerso" :
				$this->persGenerale();
				break;
			case "niveauPerso" :
				$this->persNiveau();
				break;	
					
			default : 
				die ("Action inexistante");
			
		
		}
	}
	
	private function general () {
		$liste =$this->modele->get_liste();
		$this->vue->menuNotPerso();
      	$this->vue->tab($liste);
	   //$this->modele->get_liste1();

	
	}
	
	private function niveau () {
		$this->vue->menuNotPerso();
		$listeNiveau=$this->modele->get_listeNiveau();
		$this->vue->formselNiveau($listeNiveau);	
	}


	private function sel(){
	
	if (isset($_POST['score'])) {
		$liste =$this->modele-> get_listeParNiveauScoreMax($_POST['niveaux']) ;
		$this->vue->get_tableauParNiveau($liste);
    
 
	} elseif (isset($_POST['temps'])) {
 
		$liste= $this->modele-> get_listeParNiveauTempsMax($_POST['niveaux']);
		$this->vue->get_tableauParNiveauTps($liste);

	}
}
	private function persGenerale(){
		$this->vue->menuPerso();
		$liste= $this->modele->get_liste_perso();
		$this->vue->tab($liste);
	}
	private function persNiveau(){
		$this->vue->menuPerso();
		$listeNiveau=$this->modele->get_listeNiveau();
		$this->vue->formselNiveauPerso($listeNiveau);

	}
	private function selPerso(){
	
		if (isset($_POST['score'])) {
			$liste =$this->modele-> get_liste_perso_score($_POST['niveaux']) ;
			$this->vue->get_tableauParNiveau($liste);
		
	 
		} elseif (isset($_POST['temps'])) {
	 
			$liste= $this->modele-> get_liste_perso_temps($_POST['niveaux']);
			$this->vue->get_tableauParNiveauTps($liste);
	
		}
	}


	

}