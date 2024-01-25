<?php 


// if (!defined("BASE_URL")) {
//     die("il faut passer par l'index");
// }


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
					echo 'Votre inscription a été prise en compte. Vous allez être redirigé vers la page de connexion.';
					header('Refresh: 4; URL=index.php?getmodule=modConnexion&action=formulaireConnexion');
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
			$uploadFile = $uploadDir . basename($photo['name']);
			if (move_uploaded_file($photo['tmp_name'], $uploadFile)) {
				$sql = self::$bdd->prepare('SELECT idUser FROM utilisateur ORDER BY idUser DESC LIMIT 1;');
				$sql->execute();
				$result = $sql->fetch();
				$newId = $result['idUser'] + 1; 
				$newFilePath = 'ressources/photoProfil/user' . $newId;
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
			$sql = self::$bdd->prepare("select pwd from utilisateur where login = :login");
			$sql->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
			$sql->execute();
			$result = $sql->fetch();
			$hash = $result['pwd'];
			
			if(password_verify($_POST['pwd'], $hash)){
				$_SESSION["newsession"] = $_POST['login'];
				/*verifier si la case de $_SESSION est set, si oui ça veut dire que l'user est connecté sinon non*/
				if(isset($_SESSION["newsession"])){
					//echo "vous êtes connecté !"; 
					header('Refresh: 4; URL=accueil.php'); //TODO ICI
					//header('Refresh: 1; URL=index.php?getmodule=modAccueil&action=page');
					//ou rediriger vers la page d'accueil ou la page de profil ?
				}
				else {"erreur de connexion";}	
			} else echo 'mot de passe invalide';
		}
	}

	public function deconnexion(){
		if(isset($_SESSION["newsession"])){
			unset($_SESSION["newsession"]);
			if(!isset($_SESSION["newsession"])){
				header('Refresh: 1; URL=index.php?getmodule=modAccueil&action=page');
			}	
		} else {
			header('Refresh: 1; URL=index.php?getmodule=modAccueil&action=page');

		}
	}

	



}
