<?php 

class ControllerEnnemi{ // jamais de return ou d'echo dans le controller

    private $vue;
    private $modele;

    public function __construct(VueEnnemi $vue, ModeleEnnemi $modele){
        $this->vue = $vue;
        $this->modele = $modele;
    }

    public function bienvenue(){
        $this->vue->bienvenue();
    }
}
