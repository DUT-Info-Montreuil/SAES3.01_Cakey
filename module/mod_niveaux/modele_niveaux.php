<?php 
include_once 'connexion.php';
class ModeleNiveau extends Connexion{


	private $sort;

	public function __construct($sort){
		$this->sort=$sort;
	}

	public function recupererDonneesNiveau(){
		$sql = self::$bdd->prepare("SELECT numeroNiveau, nbEnnemis, pathImageTerrain, argentBonbon, XPgagnees, ChocolatGagne, idTour FROM niveau  ORDER BY " . ($this->sort && isset($_GET['sort']) ? $_GET['sort'] : 'numeroNiveau'));
		
		if ($sql->execute()) {
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		} else {
			return null; // Aucun résultat trouvé ou une erreur s'est produite
		}
	}

}