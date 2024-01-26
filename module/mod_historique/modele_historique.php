<?php 
include_once 'connexion.php';
class ModeleHistorique extends Connexion{

    private $id;

    public function __construct(){
        $sql = self::$bdd->prepare("select idUser from utilisateur where login = :login");
		$sql->bindParam(':login', $_SESSION["newsession"], PDO::PARAM_STR);
		$sql->execute();
		$result = $sql->fetch();

        $this->id = $result['idUser'];
    }
    
    public function recupererDonneePartie(){
        $sql = self::$bdd->prepare("SELECT temps, score, isGagnee, numeroNiveau FROM partie WHERE idUser = :idUser ORDER BY numeroPartie DESC LIMIT 10; ");
		$sql->bindParam(':idUser',$this->id, PDO::PARAM_INT);
		if($sql->execute()){
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        else{
            return null;
        }
    }



}    
?>