<?php
include_once 'connexion.php';
header('Content-Type: application/json; charset=utf-8');
Connexion::initConnexion();


require_once './modeleAjax.php';
$modele = new ModeleAjax();

try {
    $data = $modele->recupererDonneesEnnemiTriPV();
    echo json_encode($data);
} catch (PDOException $e) {
    // Gérer les erreurs PDO ici
    echo json_encode(['error' => 'Erreur PDO']);
}
?>
