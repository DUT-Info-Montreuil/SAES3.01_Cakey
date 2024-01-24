<?php 

class ControllerUstensile{

    private $vue;
    private $modele;

    public function __construct(VueUstensile $vue, ModeleUstensile $modele){
        $this->vue = $vue;
        $this->modele = $modele;
    }

    public function getVue(){
        return $this->vue;
    }

    public function bienvenue(){
        $this->vue->bienvenue();
    }

    public function afficherUstensiles(){
        $this->vue->afficherUstensiles($this->modele->recupererDonneesUstensilesNiveau1());
        // $this->vue->afficherAmeliorations($this->modele->recupererDonneesUstensilesApresNiveau1($id));
    }


    public function details(){
        
    }

    public function trierUstensiles(){
        
    }


}
