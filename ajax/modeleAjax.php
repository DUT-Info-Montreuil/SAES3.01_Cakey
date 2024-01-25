<?php 
include_once './connexion.php';
class Modele extends Connexion{


    public function recupererDonneesEnnemiTriPV(){
        $sql = self::$bdd->prepare("SELECT nom, PV, porteeAttaque, pointsAttaque, recompense, pathImageEnnemi, exist FROM ennemi order by PV desc");
	    if ($sql->execute()) {
			$result = $sql->fetchAll(PDO::FETCH_ASSOC);
		    return $result;
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }


	public function recupererDonneesEnnemiTriDoExist(){
        $sql = self::$bdd->prepare("SELECT nom, PV, porteeAttaque, pointsAttaque, recompense, pathImageEnnemi, exist FROM ennemi where exist = 1 order by PV desc");
	    if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }
}