<?php

class ModeleProfil extends Connexion{
	/*
	public function get_liste () {
		$req = "SELECT * FROM equipe";
		$pdo_req = self::$bdd->query($req);
		return $pdo_req->fetchAll();
	}
	*/ 


	//modification profil : pdp à faire
	public function modifLogin($id, $nouvLogin) {
        $req = "update utilisateur set login = :login where idUser = :id";
    
        $pdo_req = self::$bdd->prepare($req);
        $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
        $pdo_req->bindParam("login", $nouvLogin, PDO::PARAM_STR);
    
        return $pdo_req->execute();
    }

    public function modifDescription($id, $nouvdescription) {
        $req = "update utilisateur set description = :description where idUser = :id";
    
        $pdo_req = self::$bdd->prepare($req);
        $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
        $pdo_req->bindParam("description", $nouvdescription, PDO::PARAM_STR);
    
        return $pdo_req->execute();
    }

	public function modifPhotoProfil($id, $pathPhotoProfil) {

        $req = "update utilisateur set pathPhotoProfil = :pathPhotoProfil where idUser = :id";
    
        $pdo_req = self::$bdd->prepare($req);
        $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
         $pdo_req->bindParam("pathPhotoProfil", $pathPhotoProfil, PDO::PARAM_STR);
    
        return $pdo_req->execute();
    }

	public function get_detailsProfil ($id) {
		$req = "SELECT utilisateur.login , utilisateur.description , utilisateur.pathPhotoProfil 
			  FROM utilisateur  
			  WHERE utilisateur.idUser=:id";

	  $pdo_req = self::$bdd->prepare($req);
	  $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	  $pdo_req->execute();
		return $pdo_req->fetch(PDO::FETCH_ASSOC);
  }

  public function get_classementProfil ($id) {
 	  $req = "SELECT partie.numeroniveau, partie.score, partie.temps   
		  FROM partie   
		  WHERE partie.idUser=:id ORDER BY score DESC limit 10" ;
	  
	  $pdo_req = self::$bdd->prepare($req);
	  $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	  $pdo_req->execute();
	  //print_r($pdo_req->fetch(PDO::FETCH_ASSOC));
	  return  $pdo_req->fetchAll(PDO::FETCH_ASSOC);
		  
  }

  public function get_classementAllLevel ($id) {
 	  $req = "SELECT distinct partie.numeroniveau, max(score) over (partition by numeroniveau) as scoremax, min(temps) over (partition by numeroniveau) as mintemps  
		  FROM partie   
		  WHERE partie.idUser=:id   ORDER BY numeroniveau " ;
	  
	  $pdo_req = self::$bdd->prepare($req);
	  $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	  $pdo_req->execute();
 	  return  $pdo_req->fetchAll(PDO::FETCH_ASSOC);
		  
  }

  public function get_amis($id){
  	  $req =
	  "select login from utilisateur where idUser in (select idUser1 from amis where idUser2 =:id)
	  union
	  select login from utilisateur where idUser in (select idUser2 from amis where idUser1 =:id) ";
	  $pdo_req = self::$bdd->prepare($req);
	  $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	  $pdo_req->execute();
	  //print_r($pdo_req->fetch(PDO::FETCH_ASSOC));
	  return  $pdo_req->fetchAll(PDO::FETCH_ASSOC);
  
  }

  public function get_demandeAmis($id){
	$req =
	"select login from utilisateur where idUser in (select idUserDemande from demandeAmis where idUserDemandeur =:id) ";
	$pdo_req = self::$bdd->prepare($req);
	$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	$pdo_req->execute();
 	return  $pdo_req->fetchAll(PDO::FETCH_ASSOC);
  }

  public function get_demandeRecu($id){
	$req =
	"select login from utilisateur where idUser in (select idUserDemandeur from demandeAmis where idUserDemande =:id) ";
	$pdo_req = self::$bdd->prepare($req);
	$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
	$pdo_req->execute();
	$resultat = $pdo_req->fetchAll(PDO::FETCH_ASSOC);
 
    return $resultat;
  }

  //creer un trigger, quand on ajoute une demande et que l'inverse existe : ami 
  // todo : possibilité de supp un ami, une demande , une demande recu 
  // todo : fix echo 

  public function ajouterAmi($login, $id) {
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
	//pq renvoie false
	
	if ($idUser !== null) {
		try{
			$req = "INSERT INTO demandeAmis VALUES (:id, :idUser, CURRENT_DATE)";
			$pdo_req = self::$bdd->prepare($req);
			$pdo_req->bindParam("idUser", $idUser, PDO::PARAM_INT);
			$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
			$pdo_req->execute();
 		?> 
		<script>alert('Demande d'ami envoyé ! ');</script>;
		<?php
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

	public function supprimerAmi($login, $monId) {
		$idUser =  $this->get_idUserAvecLogin($login);
		var_dump($monId);
		var_dump($login);

 		try{
			$req = 
			"delete from amis
			where (idUser1 = :monid and idUser2 = :id) 
				or (idUser1 = :id and idUser2 = :monid)";   
			$pdo_req = self::$bdd->prepare($req);	
			$pdo_req->bindParam("monid", $monId, PDO::PARAM_STR);
			$pdo_req->bindParam("id",$idUser, PDO::PARAM_STR);
			$pdo_req->execute();

 		}catch(PDOException $e ){
			$e->getMessage();

 		}
	}

	public function supprimerDemandeAmi($login, $monId) {
		$idUser =  $this->get_idUserAvecLogin($login);
		var_dump($monId);
		var_dump($login);

 		try{
			$req = 
			"delete from demandeAmis
			where (idUserDemandeur = :monid and idUserDemande = :id) 
 				or
				(idUserDemandeur = :id and idUserDemande = :monid) 
 				";   
			$pdo_req = self::$bdd->prepare($req);	
			$pdo_req->bindParam("monid", $monId, PDO::PARAM_STR);
			$pdo_req->bindParam("id",$idUser, PDO::PARAM_STR);
			$pdo_req->execute();

 		}catch(PDOException $e ){
			$e->getMessage();

 		}
	}


	public function accepterDemandeAmi($login, $monId) {
		$idUser =  $this->get_idUserAvecLogin($login);
		var_dump($monId);
		var_dump($login);

 		try{
			$req = 
			"delete from demandeAmis
			where (idUserDemandeur = :monid and idUserDemande = :id) 
 				or
				(idUserDemandeur = :id and idUserDemande = :monid) 
 				";   
			$pdo_req = self::$bdd->prepare($req);	
			$pdo_req->bindParam("monid", $monId, PDO::PARAM_STR);
			$pdo_req->bindParam("id",$idUser, PDO::PARAM_STR);
			$pdo_req->execute();

			$req = 
			"insert into amis values (:monid, id)";   
			$pdo_req = self::$bdd->prepare($req);	
			$pdo_req->bindParam("monid", $monId, PDO::PARAM_STR);
			$pdo_req->bindParam("id",$idUser, PDO::PARAM_STR);
			$pdo_req->execute();
			

 		}catch(PDOException $e ){
			$e->getMessage();

 		}
	}

 

 
 
	public function get_idUserAvecLogin($login){
		$req = "select idUser from utilisateur where lower(login) =lower(:login)";
		$pdo_req = self::$bdd->prepare($req);	
		$pdo_req->bindParam("login", $login, PDO::PARAM_STR);
		$pdo_req->execute();
		$idUserRow=$pdo_req->fetch(PDO::FETCH_ASSOC);
		var_dump($idUserRow);
		
		if ($idUserRow !== false) {
			try{
				$idUser = (int)$idUserRow['idUser'];
				print_r("idtrouvé : ");
				var_dump($idUser);
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
