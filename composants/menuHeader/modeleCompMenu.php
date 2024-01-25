<?php
include_once 'connexion.php';
class ModeleCompMenu extends Connexion{

	

	public function __construct(){

	}


	public function lienPathPhotoProfil(){
		$id = $_SESSION['idUser'];
		if(isset($_SESSION['newsession'])){
			$sql = self::$bdd->prepare("SELECT pathPhotoProfil FROM utilisateur WHERE idUser = :idUser;");
			$sql->bindParam(':idUser',$id, PDO::PARAM_INT);
			/*$sql->bindParam(':numeroNiveau', $niveau, PDO::PARAM_INT);*/
			if($sql->execute()){
				$result = $sql->fetch();
				if (empty($result['pathPhotoProfil'])){
					return 'ressources/photoProfil/photoProfilDefault.png';
				} else
					return $result['pathPhotoProfil'];
			}
		}else {
			return null;
		}	

	}

}


?>
