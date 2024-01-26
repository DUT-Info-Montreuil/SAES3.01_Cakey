<?php 


include_once 'connexion.php';
include_once 'securite.php';

class ModeleConnexion extends Connexion{

    public function recupDonneesInscriptionEtAjoutBD(){
			if(isset($_POST['submit'])){

				$token = $_SESSION['csrfToken'];
				if(!Securite::isTokenValid($token)){
					die('Session expirée. Veuillez réessayer');
				}

				$sql = self::$bdd->prepare("select count(login) as compteur from utilisateur where login = :login");
				$sql->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
				$sql->execute();
				$result = $sql->fetch();
				if($result['compteur'] > 0){
					echo "login déjà pris";
				} else if ($_POST["pwd"] != $_POST["pwdConf"]){
					echo "Les mots de passe ne sont pas identiques";
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
						echo 'Votre inscription a été prise en compte. Vous allez être redirigé vers la page de connexion.';
						header('Refresh: 0; URL=index.php?getmodule=modConnexion&action=formulaireConnexion');
						exit;
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
			$path_part = pathinfo(basename($photo['name']));
			$typeImg = $path_part['extension'];
	
			$uploadFile = $uploadDir . basename($photo['name']);

			$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
			$fileMimeType = mime_content_type($photo['tmp_name']);
	
			if (!in_array($fileMimeType, $allowedTypes)) {
				die("Le fichier doit être une image de type JPEG, PNG ou GIF.");
			}

			if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
				$sql = self::$bdd->prepare('SELECT idUser FROM utilisateur ORDER BY idUser DESC LIMIT 1;');
				$sql->execute();
				$result = $sql->fetch();
				$newId = $result['idUser'] + 1; 
				$newFilePath = 'ressources/photoProfil/user' . $newId . '.' . $typeImg;
				//a modifier si on veut que le num de la pp match avec l'idUser si suppression dans les lignes précédentes
				
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

	public function recupDonneesEtConnexion(){
		if(isset($_POST['seConnecter'])){
			$sql = self::$bdd->prepare("select pwd, idUser from utilisateur where login = :login");
			$sql->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
			$sql->execute();
			$result = $sql->fetch();
			$hash = $result['pwd'];
			$id = $result['idUser'];

			
			if(password_verify($_POST['pwd'], $hash)){

				$token = $_SESSION['csrfToken'];
				if(!Securite::isTokenValid($token)){
					die('Session expirée. Veuillez réessayer');
				}

				$_SESSION["newsession"] = $_POST['login'];
				$_SESSION["idUser"] = $id;
				
				if(isset($_SESSION["newsession"])){
					header('Refresh: 0; URL=index.php?getmodule=modAccueil&action=page');
				}
				else {"erreur de connexion";}	
			} else {
			 	echo 'mot de passe invalide';
			} 
		}
	}

	public function deconnexion(){
		if(isset($_SESSION["newsession"])){
			unset($_SESSION["newsession"]);
			if(!isset($_SESSION["newsession"])){
				header('Refresh: 0; URL=index.php?getmodule=modAccueil&action=page');
			}	
		} else {
			header('Refresh: 0; URL=index.php?getmodule=modAccueil&action=page');

		}
	}


}
