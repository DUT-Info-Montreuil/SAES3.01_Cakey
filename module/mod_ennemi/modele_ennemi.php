<?php 
include_once 'connexion.php';
class ModeleEnnemi extends Connexion{


	private $sort;
public function __construct($sort){
	$this->sort=$sort;
}
    public function recupererDonneesEnnemi(){
        $sql = self::$bdd->prepare("SELECT nom, PV, porteeAttaque, pointsAttaque, recompense, pathImage FROM ennemis order by ".($this->sort=="pv" ? "PV" : "nom"));
	    if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }
}