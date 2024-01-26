<?php 

class ControllerNiveau{

    private $vue;
    private $modele;

    public function __construct(VueNiveau $vue, ModeleNiveau $modele){
        $this->vue = $vue;
        $this->modele = $modele;
    }

    public function getVue(){
        return $this->vue;
    }

    public function bienvenue(){
        $this->vue->bienvenue();
    }

    public function afficherNiveaux(){
        $this->vue->afficherNiveaux($this->modele->recupererDonneesNiveau());
    }

    public function details(){
        
    }

    public function trierNiveaux(){
        
    }


}
