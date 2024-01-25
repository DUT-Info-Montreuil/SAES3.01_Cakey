<?php 
include_once 'securite.php';

// if (!defined("BASE_URL")) {
//     die("il faut passer par l'index");
// }

class ControllerConnexion{ 

private $vue;
private $modele;

public function __construct(VueConnexion $vue, ModeleConnexion $modele){
    $this->vue = $vue;
    $this->modele = $modele;
}

    public function formulaireConnexion(){
        $token = Securite::generateCsrfToken(32);
        Securite::storeToken($token, 30);
        $this->vue->formulaireConnexion($token);	  
    }

    public function formulaireInscription(){
        $token = Securite::generateCsrfToken(32);
        Securite::storeToken($token, 300);
        $this->vue->formulaireInscription($token);	
    }

    public function inscription(){
		$this->modele->recupDonneesInscriptionEtAjoutBD();
	}

    public function connexion(){
		$this->modele->recupDonneesEtConnexion();
	}

    public function deconnexion(){
        $this->modele->deconnexion();
    }
}