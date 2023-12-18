<?php 
include_once 'connexion.php';
class ModeleConnexion extends Connexion{


    public function recupDonneesInscriptionEtAjoutBD(){
		if(isset($_POST['submit'])){
			$sql = self::$bdd->prepare("select count(login) as compteur from utilisateur where login = :login");
			$sql->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
			$sql->execute();
			$result = $sql->fetch();
			if($result['compteur'] > 0){
				echo "login déjà pris";
			} else{

				$sql = self::$bdd->prepare("insert into utilisateur (login, pwd , description, argentChocolat, pathPhotoProfil) values(:login, :pwd, :description, :argentChocolat, :pathPhotoProfil)");
				$sql->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
				$pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
				$sql->bindParam(':pwd', $pwd, PDO::PARAM_STR);
				$sql->bindValue(':description', NULL, PDO::PARAM_STR);
				$sql->bindValue(':argentChocolat', 0, PDO::PARAM_INT);


				$photo = $_FILES['pathPhotoProfil'];
				$lien = $this->traitementPhoto($photo);
				$sql->bindParam(':pathPhotoProfil', $lien, PDO::PARAM_STR);


				if ($sql->execute()) {
					echo'Vous êtes inscrit !';
				}
				else {
					echo'Une erreur est survenue lors de votre inscription';
				}
		}
		}
	}


    public function traitementPhoto($photo){	
		if ($photo['error'] === UPLOAD_ERR_OK) {
			$uploadDir = 'ressources/photoProfil/';
			$uploadFile = $uploadDir . basename($photo['name']);
		if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
			$sql = self::$bdd->prepare('SELECT idUser FROM utilisateur ORDER BY idUser DESC LIMIT 1;');
			$sql->execute();
			$result = $sql->fetch();
		    $newId = $result['idUser'] + 1; 
		    $newFilePath = 'ressources/photoProfil/' . $newId;
		    
		    if (rename($uploadFile, $newFilePath)) {
                return $newFilePath;
		    } else {
			    echo "Erreur lors du renommage du fichier.";
		    }
		}else{
		    echo "Erreur lors du téléchargement du fichier.";
		}


	}
}
}