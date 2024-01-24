<?php 
include_once 'connexion.php';
class ModeleStatistiques extends Connexion{

    private $id;

    public function __construct(){
        $sql = self::$bdd->prepare("select id from utilisateur where login = :login");
		$sql->bindParam(':login', $_SESSION["newsession"], PDO::PARAM_STR);
		$sql->execute();
		$result = $sql->fetch();

        $id = $result;
    }    

}    
?>