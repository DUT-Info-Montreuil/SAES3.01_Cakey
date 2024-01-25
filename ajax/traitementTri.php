<!-- que des echos de json-->

<?php
header('Content-Type: application/json; charset=utf-8');
Connexion::initConnexion();

require_once './modeleAjax.php';
$modele = new Modele();
// $data = ('#formTrierEnnemis').serialize(); /** whatever you're serializing **/;

try {
    $data = $modele->recupererDonneesEnnemiTriPV();
    echo json_encode($data);
    
} catch (PDOException $e) {
    // Gérer les erreurs PDO ici
    echo json_encode(['error' => 'Erreur PDO']);
}
?>

<!-- 
// switch($choix){
//     case 'PV' : 
        $data = $modele->recupererDonneesEnnemiTriPV();
//         break;
//     case 'exist':
//         $data = $this->modele->recupererDonneesEnnemiTriDoExist();
//         break;
//         default : break;
// } -->



<!-- module equipe 
dossier ajax -->
