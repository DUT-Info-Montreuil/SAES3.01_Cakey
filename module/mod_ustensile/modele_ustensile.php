<?php 
include_once 'connexion.php';
class ModeleUstensile extends Connexion{


	private $sort;

	public function __construct($sort){
		$this->sort=$sort;
	}

    public function recupererDonneesUstensiles(){
        $sql = self::$bdd->prepare("SELECT idTour, nomTour, pointsAttaque, porteeAttaque, pv, prixAchat, niveau, pathImageTour FROM statistiquesTour ORDER BY " . ($this->sort && isset($_GET['sort']) ? $_GET['sort'] : 'niveau'));
		
		if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }

}