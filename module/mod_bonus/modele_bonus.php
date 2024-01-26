<?php 
include_once 'connexion.php';
class ModeleBonus extends Connexion{

	private $sort;

	public function __construct($sort){
		$this->sort=$sort;
	}

	public function recupererDonneesBonus(){
		$sql = self::$bdd->prepare("SELECT nomBonus, prixEnChocolat, description, pathImageBonus FROM bonus ORDER BY " . ($this->sort && isset($_GET['sort']) ? $_GET['sort'] : 'nomBonus'));																		
		
		if ($sql->execute()) {
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		} else {
			return null; // Aucun résultat trouvé ou une erreur s'est produite
		}
	}

}