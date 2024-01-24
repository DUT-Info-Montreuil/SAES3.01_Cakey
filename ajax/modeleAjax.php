<?php 
include_once 'connexion.php';
class ModeleAjax extends Connexion{


    public function recupererDonneesEnnemiTriPV(){
        $sql = self::$bdd->prepare("SELECT * FROM ennemis order by PV desc");
	    if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }
}