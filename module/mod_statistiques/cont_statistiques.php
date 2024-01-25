<?php class ControllerStatistiques { 

    private $vue;
    private $modele;

    public function __construct(VueStatistiques $vue, ModeleStatistiques $modele){
        $this->vue = $vue;
        $this->modele = $modele;
    }


    public function afficherPartieNiveau($niveau){
        $this->vue->afficherTableauParties($this->modele->recupererDonneePartieParNiveau($niveau));
    }

    public function getVue(){
        return $this->vue;
    }
}
?>    
