<?php

class ModeleClassement extends Connexion{
public function get_liste(){
    $req="SELECT Rank() OVER(ORDER BY Sum(score) DESC ), idUser , login,Sum(score)as Xp,MAX(numeroNiveau)as niveauMax FROM utilisateur NATURAL JOIN partie group by idUSer limit 20";
    $pdo_req = self::$bdd->query($req);
    return $pdo_req->fetchAll();
}
public function get_liste1() {
    $req="SELECT Rank() OVER(ORDER BY Sum(score) DESC ), idUser , login,Sum(score)as Xp,MAX(numeroNiveau)as niveauMax,
    (SELECT max(t1.rang) from (SELECT idUser,rang,Xpnecessaires from evolutionRang left outer join donneBonusRang using(rang)  left outer join donneBonusNiveau using(idBonus) left outer join partie using(numeroNiveau))as t1 inner join (Select  idUser ,login,Sum(score)as Xp FROM utilisateur NATURAL JOIN partie group by idUSer)as t2 using(idUser)where Xpnecessaires<Xp) as rang FROM utilisateur NATURAL JOIN partie group by idUSer limit 20 ";
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
public function get_listeParNiveau1($niveau){
    $req=Connexion::$bdd->prepare("SELECT Rank() OVER(ORDER BY score DESC ), idUser , login, score 
    FROM utilisateur NATURAL JOIN partie
     where numeroNiveau=? limit 20");
    $req->bindParam(1, $niveau);
    $req->execute();
    return $req->fetchAll();
    
}
public function get_listeParNiveauTemps($niveau){
    $req="SELECT Rank() OVER(ORDER BY temps ASC ), idUser , login, temps 
    FROM utilisateur NATURAL JOIN partie
     where numeroNiveau=1 limit 20";
    $pdo_req = self::$bdd->query($req);
    $pdo_req->bindParam("niveau", $niveau, PDO::PARAM_INT);
    $pdo_req->execute();
    return $pdo_req->fetchAll();

}
public function get_listeNiveau(){
    $req= "Select numeroNiveau from niveau";
    $pdo_req = self::$bdd->query($req);
    $pdo_req->execute();
    
    return $pdo_req->fetchAll();
}


}

/*
public function get_dixPremiersGeneral (){
    $req = ""
}
*/
