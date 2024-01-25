<?php 
include_once 'connexion.php';
class ModeleEnnemi extends Connexion{


    public function recupererDonneesEnnemi(){
        echo 'dans recupererDonneesEnnemi modele';
        echo "<br>";

        $sql = self::$bdd->prepare("SELECT nom, PV, porteeAttaque, pointsAttaque, recompense, pathImageEnnemi FROM ennemi");
	    if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }
}