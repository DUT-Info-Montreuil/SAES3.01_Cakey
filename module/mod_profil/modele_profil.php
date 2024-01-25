<?php

class ModeleProfil extends Connexion{
    private $id;

    public function __construct(){
        $sql = self::$bdd->prepare("select idUser from utilisateur where login = :login");
		$sql->bindParam(':login', $_SESSION["newsession"], PDO::PARAM_STR);
		$sql->execute();
		$result = $sql->fetch();

        $this->id = $result['idUser'];
		print_r("mon id est : ");
		print_r($this->id);
     }

	public function get_detailsProfil ($login) {
		$req = "SELECT utilisateur.login , utilisateur.description , utilisateur.pathPhotoProfil 
			  FROM utilisateur  
			  WHERE utilisateur.idUser=:id";

	  $pdo_req = self::$bdd->prepare($req);
	  $id = $this->get_idUserAvecLogin($login);
	  $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	  $pdo_req->execute();
	  $resultat = $pdo_req->fetch(PDO::FETCH_ASSOC);
	  var_dump($resultat["login"]);

 	  return $resultat;
  }



 	public function modifLogin($id, $nouvLogin) {
        $req = "update utilisateur set login = :login where idUser = :id";
    
        $pdo_req = self::$bdd->prepare($req);
        $pdo_req->bindParam("id", $this->id, PDO::PARAM_INT);
        $pdo_req->bindParam("login", $nouvLogin, PDO::PARAM_STR);
    
        return $pdo_req->execute();
    }

    public function modifDescription($nouvdescription) {
        $req = "update utilisateur set description = :description where idUser = :id";
    
        $pdo_req = self::$bdd->prepare($req);
        $pdo_req->bindParam("id", $this->id, PDO::PARAM_INT);
        $pdo_req->bindParam("description", $nouvdescription, PDO::PARAM_STR);
    
        return $pdo_req->execute();
    }
 
	public function modifPhotoProfil($nom) {
		$id = $this->get_idUserAvecLogin($nom);
		if(isset($_POST['submit'])){
			$photo = $_FILES['pathPhotoProfil'];
			//echo $photo;
			$lien = $this->traitementPhoto($photo);
			$sql = self::$bdd->prepare("update utilisateur set pathPhotoProfil = :pathPhotoProfil where idUser = :id");
		
		$sql->bindParam(':pathPhotoProfil', $lien, PDO::PARAM_STR);
		$sql->bindParam(':id', $id, PDO::PARAM_STR);

			if ($sql->execute()) {
				echo 'Photo de profil changé.';
				header('Refresh: 0; URL=index.php?getmodule=modProfil');
				exit;
			}
			else {
				echo'Une erreur est survenue lors de la modification';
			}
 		}

        $req = "update utilisateur set pathPhotoProfil = :pathPhotoProfil where idUser = :id";
    
        $pdo_req = self::$bdd->prepare($req);
        $pdo_req->bindParam("id", $this->id, PDO::PARAM_INT);
         $pdo_req->bindParam("pathPhotoProfil", $pathPhotoProfil, PDO::PARAM_STR);
    
        return $pdo_req->execute();		
		}


	public function traitementPhoto($photo){	
		if ($photo['error'] === UPLOAD_ERR_OK) {
			$uploadDir = 'ressources/photoProfil/';
			$path_part = pathinfo(basename($photo['name']));
			$typeImg = $path_part['extension'];
	
			$uploadFile = $uploadDir . basename($photo['name']);
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

  public function get_classementProfil ($nom) {
 	  $req = "SELECT partie.numeroniveau, partie.score, partie.temps   
		  FROM partie   
		  WHERE partie.idUser=:id ORDER BY score DESC limit 10" ;
	  $id=$this->get_idUserAvecLogin($nom);
	  $pdo_req = self::$bdd->prepare($req);
	  $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	  $pdo_req->execute();
	  $resultat = $pdo_req->fetchAll(PDO::FETCH_ASSOC);
 	  return $resultat;
		  
  }

  public function get_classementAllLevel ($nom) {
 	  $req = "SELECT distinct partie.numeroniveau, max(score) over (partition by numeroniveau) as scoremax, min(temps) over (partition by numeroniveau) as mintemps  
		  FROM partie   
		  WHERE partie.idUser=:id ORDER BY numeroniveau " ;
	  $id=$this->get_idUserAvecLogin($nom);
	  $pdo_req = self::$bdd->prepare($req);
	  $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	  $pdo_req->execute();
	  $resultat = $pdo_req->fetchAll(PDO::FETCH_ASSOC);
 	  return $resultat;
		  
  }

  public function get_amis($nom){
  	  $req =
	  "select login from utilisateur where idUser in (select idUser1 from amis where idUser2 =:id)
	  union
	  select login from utilisateur where idUser in (select idUser2 from amis where idUser1 =:id) ";
	  $id=$this->get_idUserAvecLogin($nom);
	  $pdo_req = self::$bdd->prepare($req);
	  $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	  $pdo_req->execute();
	  $resultat = $pdo_req->fetchAll(PDO::FETCH_ASSOC);
 	  return $resultat;
  }

  public function get_demandeAmis($nom){
	$req =
	"select login from utilisateur where idUser in (select idUserDemande from demandeAmis where idUserDemandeur =:id) ";
	$id=$this->get_idUserAvecLogin($nom);
	$pdo_req = self::$bdd->prepare($req);
	$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	$pdo_req->execute();
	$resultat = $pdo_req->fetchAll(PDO::FETCH_ASSOC);
	 return $resultat;
  }

  public function get_demandeRecu($nom){
	$req =
	"select login from utilisateur where idUser in (select idUserDemandeur from demandeAmis where idUserDemande =:id) ";
	$id=$this->get_idUserAvecLogin($nom);
	$pdo_req = self::$bdd->prepare($req);
	$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	$pdo_req->execute();
	$resultat = $pdo_req->fetchAll(PDO::FETCH_ASSOC);
	 return $resultat;
  }

  //creer un trigger, quand on ajoute une demande et que l'inverse existe : ami 
  // todo : possibilité de supp un ami, une demande , une demande recu 
  // todo : fix echo 

  public function ajouterAmi($login) {
	print_r("dmd d'ami pour  : ");
    var_dump($login);
	/*
	$req = "select idUser from utilisateur where lower(login) =lower(:login)";
	$pdo_req = self::$bdd->prepare($req);	
	$pdo_req->bindParam("login", $login, PDO::PARAM_STR);
	$pdo_req->execute();
	*/
	$idUser=$this->get_idUserAvecLogin($login);
	var_dump($idUser);
	$bool = $this->aRecuDemandeDe($idUser, $this->id);

	
	if ($idUser !== null) {
		try{
			var_dump($bool);
			if($bool){
				$this->accepterDemandeAmi($login, $this->id);
				print_r("ajouter l'ami");
			}else{
				print_r("envoyer demande l'ami");
				$req = "INSERT INTO demandeAmis VALUES (:id, :idUser, CURRENT_DATE)";
				$pdo_req = self::$bdd->prepare($req);
				$pdo_req->bindParam("idUser", $idUser, PDO::PARAM_INT);
				$pdo_req->bindParam("id", $this->id, PDO::PARAM_INT);
				$pdo_req->execute();

 		?> 
		<script>alert('Demande d'ami envoyé ! ');</script>;
		<?php
			}

		
 		}catch(PDOException $e ){
			if ($e->errorInfo[1] == 1062) {
				echo "<script>alert('Vous avez déjà envoyé une demande à cette ami ! ');</script>";
			}	
		}catch(MySQLException $e){
			$e->getMessage();
			echo "<script>alert('Un problème est survenu : '+$e' ');</script>";
		}
		}else {
			echo "<script>alert('Mais c'est qui ? ! '); </script>";
			print_r("user existe pas");

	}
}
	public function aRecuDemandeDe($id){
		$req = "select idUserDemandeur from demandeAmis
		where (idUserDemandeur = :monid and idUserDemande = :id) 
			 or
			(idUserDemandeur = :id and idUserDemande = :monid) 
			 ";  
		$pdo_req = self::$bdd->prepare($req);	
		$pdo_req->bindParam("id", $id, PDO::PARAM_STR);
		$pdo_req->bindParam("monid", $this->id, PDO::PARAM_STR);
		$pdo_req->execute(); 
		$aRecu=$pdo_req->fetch(PDO::FETCH_ASSOC);
		print_r($aRecu);
		return $aRecu;


	}

	public function supprimerAmi($login) {
		$idUser =  $this->get_idUserAvecLogin($login);
 		var_dump($login);

 		try{
			$req = 
			"delete from amis
			where (idUser1 = :monid and idUser2 = :id) 
				or (idUser1 = :id and idUser2 = :monid)";   
			$pdo_req = self::$bdd->prepare($req);	
			$pdo_req->bindParam("monid", $this->id, PDO::PARAM_STR);
			$pdo_req->bindParam("id",$idUser, PDO::PARAM_STR);
			$pdo_req->execute();

 		}catch(PDOException $e ){
			$e->getMessage();

 		}
	}

	public function supprimerDemandeAmi($login) {
		$idUser =  $this->get_idUserAvecLogin($login);
		var_dump($this->id);
		var_dump($login);

 		try{
			$req = 
			"delete from demandeAmis
			where (idUserDemandeur = :monid and idUserDemande = :id) 
 				or
				(idUserDemandeur = :id and idUserDemande = :monid) 
 				";   
			$pdo_req = self::$bdd->prepare($req);	
			$pdo_req->bindParam("monid", $this->id, PDO::PARAM_STR);
			$pdo_req->bindParam("id",$idUser, PDO::PARAM_STR);
			$pdo_req->execute();

 		}catch(PDOException $e ){
			$e->getMessage();

 		}
	}


	public function accepterDemandeAmi($login) {
		$idUser =  $this->get_idUserAvecLogin($login);
		var_dump($this->id);
		print_r("acceptation de ");
		var_dump($login);

 		try{
 			$req = 
			"delete from demandeAmis
			where (idUserDemandeur = :monid and idUserDemande = :id) 
 				or
				(idUserDemandeur = :id and idUserDemande = :monid) 
 				";   
			$pdo_req = self::$bdd->prepare($req);	
			$pdo_req->bindParam("monid", $this->id, PDO::PARAM_STR);
			$pdo_req->bindParam("id",$idUser, PDO::PARAM_STR);
			$pdo_req->execute();

 			$req2 = 
			"insert into amis values (:monid, :id)";   
			$pdo_req2 = self::$bdd->prepare($req2);	
			$pdo_req2->bindParam("monid", $this->id, PDO::PARAM_STR);
			$pdo_req2->bindParam("id",$idUser, PDO::PARAM_STR);
			$pdo_req2->execute();
			print_r("acceptaiton ");

			

 		}catch(PDOException $e ){
			print_r("fail accepter");
			print_r($e->getMessage());

 		}
	}

 

 
 
	public function get_idUserAvecLogin($login){
		$req = "select idUser from utilisateur where lower(login) =lower(:login)";
		$pdo_req = self::$bdd->prepare($req);	
		$pdo_req->bindParam("login", $login, PDO::PARAM_STR);
		$pdo_req->execute();
		$idUserRow=$pdo_req->fetch(PDO::FETCH_ASSOC);
 		
		if ($idUserRow !== false) {
			try{
				$idUser = (int)$idUserRow['idUser'];
				print_r("idtrouvé : ");
  				return $idUser;
			}catch(PDOException $e ){
					$e->getMessage();
					echo "<script>alert('Vous avez déjà envoyé une demande à cette ami ! ');</script>";
					return 0;
				}	
			}else {
				print_r("iduser row false");

		}
	}	
}
