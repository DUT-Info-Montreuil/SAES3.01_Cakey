<?php class ControllerEnnemis{ // jamais de return ou d'echo dans le controller



private $vue;
private $modele;



public function __construct(VueJoueurs $vue, ModeleJoueurs $modele){
    $this->vue = $vue;
    $this->modele = $modele;
}


public function bienvenue(){
    $this->vue->bienvenue();
}



public function getVue(){
    return $this->vue;
}


}



?>
