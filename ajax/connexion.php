<?php class Connexion{

protected static $bdd;


public static function initConnexion(){
    try {
        self::$bdd = new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201628', 'dutinfopw201628', 'bumuqasy');
self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //    echo "CONNEXION à la base de données REUSSIE.";
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
}

?>
