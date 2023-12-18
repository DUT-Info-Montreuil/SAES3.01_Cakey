<?php class ControllerConnexion{ 

private $vue;
private $modele;

public function __construct(VueConnexion $vue, ModeleConnexion $modele){
    $this->vue = $vue;
    $this->modele = $modele;
}

    public function formulaireConnexion(){
        $this->vue->formulaireConnexion();	  
    }

    public function formulaireInscription(){
        $this->vue->formulaireInscription();	
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