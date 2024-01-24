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
			case "changerPhotoProfil" :
				$this->changerPhotoProfil();
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
		// données table classement 
		$donneesClassement = $this->modele->get_classementProfil ($id_profil);
		if (!$donneesClassement) {
			die("Erreur dans la récupération des données classements");
		}
		$classementAllLevel = $this->modele->get_classementAllLevel ($id_profil);
		if (!$classementAllLevel) {
			die("Erreur dans la récupération des données classements tout niveau");
		}
		$amis = $this->modele->get_amis ($id_profil);
		if (!$amis) {
			die("Erreur dans la récupération des données des amis");
		}
		$dmdamis = $this->modele->get_demandeAmis ($id_profil);
		if (!$dmdamis) {
			die("Erreur dans la récupération des données des amis");
		}
		$dmdAmisRecu = $this->modele->get_demandeRecu ($id_profil);
		if (!$dmdAmisRecu) {
			die("Erreur dans la récupération des données des amis recu");
		}
 		$this->vue->donneesProfil($donnees, $donneesClassement, $classementAllLevel, $amis, $dmdamis, $dmdAmisRecu );
 		
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
/*
 https://www.referenseo.com/wp-content/uploads/2019/03/image-attractive.jpg
 https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg
  */ private function changerPhotoProfil () {
	$id = 1;  //$_SESSION['id']?
	$donneeProfil=$this->modele->get_detailsProfil($id);

	$defaultPDP = $donneeProfil['pathPhotoProfil'];
 	$nouvPDP = isset($_POST['linkPDP']) ? $_POST['linkPDP'] : $defaultPDP;
 
	$this->vue->modifPhotoProfil( );
	$this->donneesProfil();
 	$this->modele->modifPhotoProfil($id, $nouvPDP );

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