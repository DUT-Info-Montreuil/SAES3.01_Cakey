<?php class ControllerHistorique { 

    private $vue;
    private $modele;

    public function __construct(VueHistorique $vue, ModeleHistorique $modele){
        $this->vue = $vue;
        $this->modele = $modele;
    }


    public function afficherPartieNiveau($niveau){
        $this->vue->afficherTableauParties($this->modele->recupererDonneePartie());
    }

    public function getVue(){
        return $this->vue;
    }
}
?>    
