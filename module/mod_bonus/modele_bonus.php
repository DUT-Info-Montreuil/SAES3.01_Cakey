<?php 
include_once 'connexion.php';
class ModeleBonus extends Connexion{


    public function recupererDonneesBonus(){
        $sql = self::$bdd->prepare("SELECT nom, prixEnChocolat, description, pathImageBonus, exist FROM bonus");
	    if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }
}