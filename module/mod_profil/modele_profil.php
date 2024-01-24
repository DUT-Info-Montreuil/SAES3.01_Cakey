<?php

class ModeleProfil extends Connexion{
	/*
	public function get_liste () {
		$req = "SELECT * FROM equipe";
		$pdo_req = self::$bdd->query($req);
		return $pdo_req->fetchAll();
	}
	*/ 
	public function get_detailsProfil ($id) {
  		$req = "SELECT utilisateur.login , utilisateur.description , utilisateur.pathPhotoProfil 
				FROM utilisateur  
				WHERE utilisateur.idUtil=:id";

		$pdo_req = self::$bdd->prepare($req);
		$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
		$pdo_req->execute();
  		return $pdo_req->fetch(PDO::FETCH_ASSOC);
	}

	public function get_classementProfil ($id) {
		$req = "SELECT niveau, degatmax, temps, xp 
			FROM partie   
			WHERE utilisateur.idUtil=:id";
	}
	
	//modification profil : pdp à faire
	public function modifLogin($id, $nouvLogin) {
        $req = "update utilisateur set login = :login where idUtil = :id";
    
        $pdo_req = self::$bdd->prepare($req);
        $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
        $pdo_req->bindParam("login", $nouvLogin, PDO::PARAM_STR);
    
        return $pdo_req->execute();
    }

    public function modifDescription($id, $nouvdescription) {
        $req = "update utilisateur set description = :description where idUtil = :id";
    
        $pdo_req = self::$bdd->prepare($req);
        $pdo_req->bindParam("id", $id, PDO::PARAM_INT);
        $pdo_req->bindParam("description", $nouvdescription, PDO::PARAM_STR);
    
        return $pdo_req->execute();
    }
	



	
	
	
}
