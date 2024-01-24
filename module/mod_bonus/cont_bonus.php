<?php 

class ControllerBonus{

    private $vue;
    private $modele;

    public function __construct(VueBonus $vue, ModeleBonus $modele){
        $this->vue = $vue;
        $this->modele = $modele;
    }

    public function getVue(){
        return $this->vue;
    }

    public function bienvenue(){
        $this->vue->bienvenue();
    }

    public function afficherBonus(){
        $this->vue->afficherBonus($this->modele->recupererDonneesBonus());
    }

    public function details(){
        
    }

    public function trier(){
        
    }


}
