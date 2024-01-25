<?php 
include_once 'connexion.php';
class ModeleUstensile extends Connexion{


	private $sort;

	public function __construct($sort){
		$this->sort=$sort;
	}

    public function recupererDonneesUstensiles(){
        $sql = self::$bdd->prepare("SELECT idTour, nom, pointsAttaque, porteeAttaque, pv, prixAchat, niveau, pathImageTour, exist FROM statistiquesTour ORDER BY " . ($this->sort && isset($_GET['sort']) ? $_GET['sort'] : 'niveau'));
		// $sql = self::$bdd->prepare("SELECT idEnnemi, nom, PV, porteeAttaque, pointsAttaque, recompense, pathImageEnnemi, exist FROM ennemi ORDER BY " . ($this->sort && isset($_GET['sort']) ? $_GET['sort'] : 'nom'));

		
		if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }

}