<?php 
include_once 'connexion.php';
class ModeleEnnemi extends Connexion{


	private $sort;

	public function __construct($sort){
		$this->sort=$sort;
	}


    public function recupererDonneesEnnemi(){
		$sql = self::$bdd->prepare("SELECT idEnnemi, nomEnnemi, PV, porteeAttaque, pointsAttaque, recompense, pathImageEnnemi FROM ennemi ORDER BY " . ($this->sort && isset($_GET['sort']) ? $_GET['sort'] : 'nomEnnemi'));
																		
	    if ($sql->execute()) {
		    return $sql->fetchAll(PDO::FETCH_ASSOC);
	    } else {
		    return null; // Aucun résultat trouvé ou une erreur s'est produite
	    }
    }
}