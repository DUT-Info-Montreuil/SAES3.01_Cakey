<?php

class ModeleClassement extends Connexion{
    private $id;

    public function __construct(){
        $sql = self::$bdd->prepare("select idUser from utilisateur where login = :login");
		$sql->bindParam(':login', $_SESSION["newsession"], PDO::PARAM_STR);
		$sql->execute();
		$result = $sql->fetch();

        $this->id = $result['idUser'];
    }
public function get_liste(){
    $req="SELECT (Rank() OVER(ORDER BY Sum(score) DESC ))as rangG, idUser , login,Sum(score)as Xp,MAX(numeroNiveau)as niveauMax FROM utilisateur NATURAL JOIN partie group by idUSer limit 20";
    $pdo_req = self::$bdd->query($req);
    return $pdo_req->fetchAll();
}
public function get_liste1() {
    $req="SELECT (Rank() OVER(ORDER BY Sum(score) DESC ))as rangG,
     idUser , login,Sum(score)as Xp,MAX(numeroNiveau)as niveauMax 
    FROM utilisateur NATURAL JOIN partie 
    group by idUSer";
    $pdo_req = self::$bdd->query($req);
    $pdo_req->execute();
    print_r( $pdo_req->fetchall(pdo::FETCH_ASSOC));
    return $pdo_req->fetchAll();
    /*$req="SELECT max(t1.rang) from (SELECT idUser,rang,Xpnecessaires from evolutionRang left outer join donneBonusRang using(rang)  left outer join donneBonusNiveau using(idBonus) left outer join partie using(numeroNiveau))as t1 inner join (Select  idUser ,login,Sum(score)as Xp FROM utilisateur NATURAL JOIN partie group by idUSer)as t2 using(idUser)where Xpnecessaires<Xp ";
    $req="SELECT Max(rang) from evolutionRang left outer join donneBonusRang using(rang)  left outer join donneBonusNiveau using(idBonus) left outer join partie using(numeroNiveau) where Xpnecessaires < 1500";

    */
}
public function get_listeParNiveau($niveau){
    $req="SELECT Rank() OVER(ORDER BY score DESC ), idUser , login, score 
    FROM utilisateur NATURAL JOIN partie
     where numeroNiveau=1 limit 20";
    $pdo_req = self::$bdd->query($req);
    $pdo_req->bindParam("niveau", $niveau);
    $pdo_req->execute();
    return $pdo_req->fetchAll();
    
}
public function get_listeParNiveauScore($niveau){
    $req=Connexion::$bdd->prepare("SELECT Rank() OVER(ORDER BY score DESC ), idUser , login, score 
    FROM utilisateur NATURAL JOIN partie
     where numeroNiveau=? limit 20");
    $req->bindParam(1, $niveau);
    $req->execute();
    return $req->fetchAll();  
}
public function get_listeParNiveauScoreMax($niveau){
    $req=Connexion::$bdd->prepare("SELECT (Rank() OVER(ORDER BY MAX(score) DESC ))as rankScore, idUser , login, MAX(score) as score
    FROM (SELECT idUser , login ,score
    FROM utilisateur NATURAL JOIN partie
     where numeroNiveau=? )as t 
     GROUP BY idUSer
      limit 20");
    $req->bindParam(1, $niveau);
    $req->execute();
    return $req->fetchAll();  
}

public function get_listeParNiveauTempsMax($niveau){
    $req=Connexion::$bdd->prepare("SELECT (Rank() OVER(ORDER BY MIN(temps) DESC ))as rankTemps, idUser , login, MIN(temps) as temps
    FROM( SELECT idUser , login, temps 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=?) as t
    GROUP BY idUSer 
    limit 20 ");
    $req->bindParam(1, $niveau);
    $req->execute();
    return $req->fetchAll();

}
public function get_listeNiveau(){
    $req= "Select numeroNiveau from niveau";
    $pdo_req = self::$bdd->query($req);
    $pdo_req->execute();
    
    return $pdo_req->fetchAll();
}
public function get_liste_perso(){
    $req=Connexion::$bdd->prepare("SELECT * 
        FROM(SELECT (Rank() OVER(ORDER BY Sum(score) DESC ))rangG, idUser , login,Sum(score)as Xp,MAX(numeroNiveau)as niveauMax 
        FROM utilisateur NATURAL JOIN partie group by idUSer)as t
        where t.rangG <=(SELECT rangG
        FROM(SELECT (Rank() OVER(ORDER BY Sum(score) DESC ))rangG, idUser , login,Sum(score)as Xp,MAX(numeroNiveau)as niveauMax 
        FROM utilisateur NATURAL JOIN partie group by idUSer)as t where idUser=?)+2
        AND t.rangG >=(SELECT rangG
        FROM(SELECT (Rank() OVER(ORDER BY Sum(score) DESC ))rangG, idUser , login,Sum(score)as Xp,MAX(numeroNiveau)as niveauMax 
        FROM utilisateur NATURAL JOIN partie group by idUSer)as t where idUser=?)-2");
    $req->bindParam(1, $this->id);
    $req->bindParam(2, $this->id);

    $req->execute();

    return $req->fetchAll();
}
public function get_liste_perso_temps($niveau){
    $req=Connexion::$bdd->prepare("SELECT *
    FROM(SELECT (Rank() OVER(ORDER BY MIN(temps) DESC ))as rankTemps, idUser , login, MIN(temps) as temps
    FROM( SELECT idUser , login, temps 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=?) as t
    GROUP BY idUSer)as t1

    WHERE rankTemps<=(SELECT rankTemps
    FROM(SELECT (Rank() OVER(ORDER BY MIN(temps) DESC ))as rankTemps, idUser , login, MIN(temps) as temps
    FROM( SELECT idUser , login, temps 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=?) as t
    GROUP BY idUSer)as t1 
    where idUser=? limit 1)+2
    AND rankTemps>=(SELECT rankTemps
    FROM(SELECT (Rank() OVER(ORDER BY MIN(temps) DESC ))as rankTemps, idUser , login, MIN(temps) as temps
    FROM( SELECT idUser , login, temps 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=?) as t
    GROUP BY idUSer)as t1 
    where idUser=? limit 1)-2
   ");
    $req->bindParam(1, $niveau);
    $req->bindParam(2, $niveau);
    $req->bindParam(3, $this->id);
    $req->bindParam(4, $niveau);
    $req->bindParam(5, $this->id);



   

    $req->execute();
    //print_r( $req->fetchall(pdo::FETCH_ASSOC));
    return $req->fetchAll();

}
public function get_liste_perso_score($niveau){
    $req=Connexion::$bdd->prepare("SELECT *
    FROM(SELECT (Rank() OVER(ORDER BY MAX(score) DESC ))as rankScore, idUser , login, MAX(score)as score
    FROM( SELECT idUser , login, score 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=?) as t
    GROUP BY idUSer)as t1

    WHERE rankScore<=(SELECT rankScore
    FROM(SELECT (Rank() OVER(ORDER BY MAX(score) DESC ))as rankScore, idUser , login, MAX(score)as score
    FROM( SELECT idUser , login, score 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=?) as t
    GROUP BY idUSer)as t1 
    where idUser=? limit 1)+2
    AND rankScore>=(SELECT rankScore
    FROM(SELECT (Rank() OVER(ORDER BY MAX(score) DESC ))as rankScore, idUser , login, MAX(score)as score
    FROM( SELECT idUser , login, score 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=?) as t
    GROUP BY idUSer)as t1 
    where idUser=? limit 1)-2
   ");
    $req->bindParam(1, $niveau);
    $req->bindParam(2, $niveau);
    $req->bindParam(3, $this->id);
    $req->bindParam(4, $niveau);
    $req->bindParam(5, $this->id);


    $req->execute();
    return $req->fetchAll();
    
}
/*"SELECT * FROM 
   (SELECT (Rank() OVER(ORDER BY MIN(temps) DESC ))as rankTemps, idUser , login, MIN(temps) as temps
    FROM( SELECT idUser , login, temps 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=?) as t
    GROUP BY idUSer)as t2
    WHERE rankTemps<= SELECT rankTemps FROM (SELECT (Rank() OVER(ORDER BY MIN(temps) DESC ))as rankTemps, idUser , login, MIN(temps) as temps
    FROM( SELECT idUser , login, temps 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=1) as t
    GROUP BY idUSer)as t2 where idUSer=1)
    
    
    
    SELECT *
    FROM(SELECT (Rank() OVER(ORDER BY MIN(temps) DESC ))as rankTemps, idUser , login, MIN(temps) as temps
    FROM( SELECT idUser , login, temps 
    FROM utilisateur NATURAL JOIN partie
    where numeroNiveau=?) as t
    GROUP BY idUSer)as t1
    WHERE rankTemps<=6
    AND rankTemps>=2
    */

}