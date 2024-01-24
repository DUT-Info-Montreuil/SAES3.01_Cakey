<?php 
include_once 'connexion.php';
class ModeleNiveau extends Connexion{


    public function recupererDonneesNiveau(){
        $sql = self::$bdd->prepare("SELECT numeroNiveau, nbEnnemis, pathImageTerrain, argentBonbon, XPgagnees, ChocolatGagne, idTour, exist FROM niveau");
	    if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }
}