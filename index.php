<h1>INDEX</h1>

<?php session_start();

include_once './connexion.php';
include_once './vueGenerique.php';

include_once './modules/mod_ennemis/controllerEnnemis.php';
include_once './modules/mod_ennemis/modeleEnnemis.php';
include_once './modules/mod_ennemis/vueEnnemis.php';

include_once './composants/vueCompMenu.php';
include_once './composants/controllerCompMenu.php';

Connexion::initConnexion();

$vueGenerique = new VueGenerique();
$getmodule = isset($_GET['getmodule']) ? $_GET['getmodule'] : 'modConnexion';
switch ($getmodule) {
    case 'modEnnemis':
        include_once './modules/mod_ennemis/mod_Ennemis.php';
        $module = new ModJoueurs;
        break;
    case 'modTours':
       // include_once './modules/mod_equipes/mod_equipes.php';
        //$module = new ModEquipes;
        break;
   /* case 'modConnexion':
        include_once './modules/mod_connexion/mod_connexion.php';
        $module = new ModConnexion;
        break;*/
    default : break;
}

//données dynamiques//
$pageTitle = "Cakey";
$tampon = $vueGenerique->getAffichage();
//fin données dynamiques//

include_once './template.php';

?>