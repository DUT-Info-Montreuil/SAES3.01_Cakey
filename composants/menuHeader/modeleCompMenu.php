<?php
include_once 'connexion.php';
class ModeleCompMenu extends Connexion{

	private $id;

	public function __construct(){
		$id = $_SESSION['idUser'];

	}


	public function lienPathPhotoProfil(){
		if(isset($_SESSION['newsession'])){
			$sql = self::$bdd->prepare("SELECT pathPhotoProfil FROM utilisateur WHERE idUser = :idUser;");
			$sql->bindParam(':idUser',$this->id, PDO::PARAM_INT);
			/*$sql->bindParam(':numeroNiveau', $niveau, PDO::PARAM_INT);*/
			if($sql->execute()){
				$result = $sql->fetch();
				if ($result['pathPhotoProfil'] = NULL){
					return 'ressources/photoProfil/photoProfilDefault.jpg';
				} else
					return $result['pathPhotoProfil'];
			}
		}else {
			return null;
		}	

	}

}


?>
