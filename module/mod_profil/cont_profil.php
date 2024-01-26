<?php
require_once "module/mod_profil/modele_profil.php";
require_once "module/mod_profil/vue_profil.php";

class ControleuProfil {
	private $modele;
	private $vue;
	private $action;
	private $nom;
	
	public function __construct() {
		$this->modele = new ModeleProfil();
		$this->vue = new VueProfil();
		$this->nom = isset($_GET["nom"]) ? $_GET["nom"] : (isset($_SESSION['newsession']) ? $_SESSION['newsession'] : null);		
	}
	
	public function exec() {
		$this->action = isset($_GET["action"]) ? $_GET["action"] : "profil";
 		if(isset($_SESSION['newsession'])&& $this->nom==$_SESSION['newsession']){
 			switch ($this->action) {
				case "profil" :
					$this->afficheProfilModifiable();
					break;
				case "partager" :  
					$this->partagerProfil(); 
					break;
				case "modifProfil" :
					$this->modifProfil();
					break;
				case "ajoutAmi" :
 					$this->ajoutAmi();
					break;
				case "changerPhotoProfil" :
					$this->changerPhotoProfil();
					break;
				case "supprimerAmi":
					$this->supprimerAmi();
					break;
				case "supprimerDemandeAmi" :
					$this->supprimerDemandeAmi();
					break;
				case "accepterDemandeAmi" :
					$this->accepterDemandeAmi();
					break;
				case "afficheProfile" :
					$this->afficheProfil();
					break;

				default : 
					die ("Action inexistante");
			
		}
		}else{
 			switch ($this->action) {
				case "profil" :
					$this->afficheProfil();
					break;

			}
		}	

	}

	
	private function afficheProfilModifiable () {
		//partie personnel 
 		$donnees = $this->modele->get_detailsProfil($this->nom);

		if (!$donnees) {
			die("Erreur dans la récupération du profil");
		}
		//partie classement
 		$donneesClassement = $this->modele->get_classementProfil ($this->nom);
		$classementAllLevel = $this->modele->get_classementAllLevel ($this->nom);

		//partie social 
		$amis = $this->modele->get_amis ($this->nom);
		$dmdamis = $this->modele->get_demandeAmis ($this->nom);
		$dmdAmisRecu = $this->modele->get_demandeRecu ($this->nom);
		 
 		$this->vue->afficheProfilModifiable($donnees, $donneesClassement, $classementAllLevel, $amis, $dmdamis, $dmdAmisRecu );
 		
	}

	private function modifProfil() {
 	   $nouvLogin = isset($_POST['login']) ? $_POST['login'] : '';
	   $nouvdescription = isset($_POST['description']) ? $_POST['description'] : '';
	   
		if ($nouvLogin !== '') {
			$this->modele->modifLogin($nouvLogin);
	   }
   
	   if ($nouvdescription !== '') {
			$this->modele->modifDescription($nouvdescription);
	   }
		header("Location: index.php?getmodule=modProfil");
	   exit();
   }

	private function afficheProfil () {
		$nom = isset($_GET["nom"]) ? $_GET["nom"] : "";

		//partie peresonnel 
		$donnees = $this->modele->get_detailsProfil ($nom);
		if (!$donnees) {
			die("Erreur dans la récupération du profil");
		}
		//partie classement
		$donneesClassement = $this->modele->get_classementProfil ($nom);
		$classementAllLevel = $this->modele->get_classementAllLevel ($nom);

		//partie social 
		$amis = $this->modele->get_amis ($nom);
		$dmdamis = $this->modele->get_demandeAmis ($nom);
		$dmdAmisRecu = $this->modele->get_demandeRecu ($nom);
		
		$this->vue->afficheProfil($donnees, $donneesClassement, $classementAllLevel, $amis, $dmdamis, $dmdAmisRecu );
 
}
 
	private function changerPhotoProfil () {
	
		$this->modele->modifPhotoProfil($this->nom);
		$this->afficheProfilModifiable();
	
	}
	private function ajoutAmi () {
 		$loginJoueur = isset($_POST['login']) ? $_POST['login'] : '';
 		if ($loginJoueur !== '') {
  			$this->modele->ajouterAmi($loginJoueur);
		}else{
			print_r("erreur login joueur vide? ");
 		}
		$this->afficheProfilModifiable();
 	}

	private function supprimerAmi () {
 		$user = isset($_GET["user"]) ? $_GET["user"] : "";
		$this->modele->supprimerAmi($user );
		$this->afficheProfilModifiable();

	}
	private function supprimerDemandeAmi () {
 		$user = isset($_GET["user"]) ? $_GET["user"] : "";
		$this->modele->supprimerDemandeAmi($user);
		$this->afficheProfilModifiable();

	}

	private function accepterDemandeAmi () {
 		$user = isset($_GET["user"]) ? $_GET["user"] : "";
		$this->modele->accepterDemandeAmi($user);
		$this->afficheProfilModifiable();

	}


}
