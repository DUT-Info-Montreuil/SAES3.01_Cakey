<?php 
include_once 'connexion.php';
class ModeleStatistiques extends Connexion{

    private $id;

    public function __construct(){
        $sql = self::$bdd->prepare("select idUser from utilisateur where login = :login");
		$sql->bindParam(':login', $_SESSION["newsession"], PDO::PARAM_STR);
		$sql->execute();
		$result = $sql->fetch();

        $this->id = $result['idUser'];
    }
    
    public function recupererDonneePartieParNiveau($niveau){
        $sql = self::$bdd->prepare("select numeroPartie,temps,score,isGagnee,numeroNiveau from partie where idUser = :idUser and numeroNiveau = :numeroNiveau order by numeroPartie");
		$sql->bindParam(':idUser',$this->id, PDO::PARAM_INT);
        $sql->bindParam(':numeroNiveau', $niveau, PDO::PARAM_INT);
        echo '' . $this->id . '';
        echo '' . $niveau . '';
		if($sql->execute()){
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            var_dump($result);
            return $result;
        }
        else{
            return null;
        }
    }

    public function recupererDonneePartie(){
        $sql = self::$bdd->prepare("select * from partie where idUser = :idUser order by numeroPartie");
		$sql->bindParam(':idUser',$this->id, PDO::PARAM_INT);
		if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        else{
            return null;
        }
    }



}    
?>