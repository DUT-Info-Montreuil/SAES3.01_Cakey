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
 		$this->nom = isset($_GET["nom"]) && $_GET["nom"] !== null ? $_GET["nom"] : $_SESSION['newsession'];
	}
	
	public function exec() {
		$this->action = isset($_GET["action"]) ? $_GET["action"] : "profil";
		//$this->nom = isset($_GET["nom"]) ? $_GET["nom"] : $_SESSION['newsession'];
		//print_r("on cherche le profil de ");
		//print_r($this->nom);
		//print_r($_SESSION['newsession']);

		if(isset($_SESSION['newsession'])&& $this->nom==$_SESSION['newsession']){
			print_r("cest mon profil");
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
					print_r("oui");
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
			print_r("cest pas mon profil");

			switch ($this->action) {
				case "profil" :
					$this->afficheProfil();
					break;

			}
		}	

	}

	
	private function afficheProfilModifiable () {
		//partie peresonnel 
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
/*
exemple de pdp
 https://www.referenseo.com/wp-content/uploads/2019/03/image-attractive.jpg
 https://helpx.adobe.com/content/dam/help/en/photoshop/using/convert-color-image-black-white/jcr_content/main-pars/before_and_after/image-before/Landscape-Color.jpg
  */ 
  private function changerPhotoProfil () {
  
	//$this->vue->modifPhotoProfil( );
 	$this->modele->modifPhotoProfil($this->nom);
	 $this->afficheProfilModifiable();

 

}
	private function ajoutAmi () {
 		$loginJoueur = isset($_POST['login']) ? $_POST['login'] : '';
 		if ($loginJoueur !== '') {
			print_r("joueur vide");

			$this->modele->ajouterAmi($loginJoueur);
		}else{
			print_r("erreur login joueur vide? ");
 		}
		$this->afficheProfilModifiable();
		print_r("donne");
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

	/*
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
		 $this->afficheProfilModifiable();

	}
*/

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