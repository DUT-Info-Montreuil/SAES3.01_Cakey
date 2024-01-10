<?php

class ModeleClassement extends Connexion{
public function get_liste(){
    $req="SELECT* FROM utilisateur";
    $pdo_req = self::$bdd->query($req);
    return $pdo_req->fetchAll();
}
}
/*
public function get_dixPremiersGeneral (){
    $req = ""
}
*/