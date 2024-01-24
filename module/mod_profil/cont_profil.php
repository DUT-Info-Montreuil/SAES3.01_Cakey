<?php
require_once "module/mod_profil/modele_profil.php";
require_once "module/mod_profil/vue_profil.php";

class ControleuProfil {
	private $modele;
	private $vue;
	private $action;
	
	public function __construct() {
		$this->modele = new ModeleProfil();
		$this->vue = new VueProfil();
	}
	
	public function exec() {
		$this->action = isset($_GET["action"]) ? $_GET["action"] : "profil";
		
		switch ($this->action) {
 			case "profil" :
				$this->donneesProfil();
				break;
			case "partager" : // ou avec js
				$this->partagerProfil(); 
				break;
			case "modifProfil" :
				$this->modifProfil();
				break;
			case "inventaire" :
				$this->inventaire();
				break;
			case "ajoutAmi" :
				$this->ajoutAmi();
				break;

			default : 
				die ("Action inexistante");
			
		}
	}

	
	private function donneesProfil () {
 		$id_profil = isset ($_GET["id"]) ? $_GET["id"] : 1;
		$donnees = $this->modele->get_detailsProfil ($id_profil);
		if (!$donnees) {
			die("Erreur dans la récupération du profil");
		}
 		$this->vue->donneesProfil($donnees);
	}

	private function modifProfil() {
		$id = 1;  //$_SESSION['id']?
	   $nouvLogin = isset($_POST['login']) ? $_POST['login'] : '';
	   $nouvdescription = isset($_POST['description']) ? $_POST['description'] : '';
	   
		if ($nouvLogin !== '') {
			$this->modele->modifLogin($id, $nouvLogin);
	   }
   
	   if ($nouvdescription !== '') {
			$this->modele->modifDescription($id, $nouvdescription);
	   }
   
		header("Location: index.php?getmodule=modProfil");
	   exit();
   }
	private function partagerProfil () {
  
	}

	private function inventaire () {
  
	}

	private function ajoutAmi () {
  
	}

}



/*	private function liste () {
		$liste = $this->modele->get_liste();
 		$this->vue->liste ($liste);
	}
	
	private function details () {
		$id_equipe = isset ($_GET["id"]) ? $_GET["id"] : die("Paramètre manquant");
		$donnees = $this->modele->get_details ($id_equipe);
		if (!$donnees) {
			die("Erreur dans la récupération de l'équipe");
		}
 		$this->vue->details ($donnees);
	}
	
*/