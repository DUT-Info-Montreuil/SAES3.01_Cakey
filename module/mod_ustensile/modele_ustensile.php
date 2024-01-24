<?php 
include_once 'connexion.php';
class ModeleUstensile extends Connexion{


    public function recupererDonneesUstensilesNiveau1(){
        $sql = self::$bdd->prepare("SELECT idTour, nom, pointsAttaque, porteeAttaque, pv, prixAchat, niveau, pathImageTour, exist FROM statistiquesTour order by niveau, nom");
	    if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }


	public function recupererDonneesUstensilesApresNiveau1($id){
        $sql = self::$bdd->prepare("SELECT nom, pointsAttaque, porteeAttaque, pv, prixAchat, niveau, pathImageTour, exist FROM statistiquesTour where niveau > 1 and idTour = :id ");
		$sql->bindParam(":id", $id, PDO::PARAM_INT);
	    if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }
}