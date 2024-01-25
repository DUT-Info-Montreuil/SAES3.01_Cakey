<?php 

class ControllerEnnemi{

    private $vue;
    private $modele;

    public function __construct(VueEnnemi $vue, ModeleEnnemi $modele){
        $this->vue = $vue;
        $this->modele = $modele;
    }

    public function getVue(){
        return $this->vue;
    }

    public function bienvenue(){
        $this->vue->bienvenue();
    }

    public function afficherEnnemis(){
        $this->vue->afficherEnnemis($this->modele->recupererDonneesEnnemi($_POST['sort']));
    }

    public function details(){
        
    }

    public function trier(){
        
    }


}
