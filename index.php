<h1>INDEX</h1>

<?php session_start();

include_once './connexion.php';
include_once './vueGenerique.php';

include_once './module/mod_ennemi/cont_ennemi.php';
include_once './module/mod_ennemi/mod_ennemi.php';
include_once './module/mod_ennemi/vue_ennemi.php'; 

include_once './module/mod_niveaux/cont_niveaux.php';
include_once './module/mod_niveaux/mod_niveaux.php';
include_once './module/mod_niveaux/vue_niveaux.php'; 

include_once './module/mod_profil/cont_profil.php'; 
include_once './module/mod_profil/mod_profil.php';
include_once './module/mod_profil/vue_profil.php'; 

include_once './module/mod_univers/cont_univers.php';  
include_once './module/mod_univers/mod_univers.php';
include_once './module/mod_univers/vue_univers.php';

include_once './module/mod_ustensile/cont_ustensile.php';  
include_once './module/mod_ustensile/mod_ustensile.php';
include_once './module/mod_ustensile/vue_ustensile.php'; 

include_once './module/mod_bonus/cont_bonus.php';
include_once './module/mod_bonus/mod_bonus.php';
include_once './module/mod_bonus/vue_bonus.php'; 

include_once './module/mod_classement/cont_classement.php';
include_once './module/mod_classement/mod_classement.php';
include_once './module/mod_classement/vue_classement.php'; 

include_once './module/mod_connexion/cont_connexion.php';
include_once './module/mod_connexion/mod_connexion.php';
include_once './module/mod_connexion/vue_connexion.php'; 


include_once './composants/vueCompMenu.php';
include_once './composants/controllerCompMenu.php';

Connexion::initConnexion();

$vueGenerique = new VueGenerique();
$getmodule = isset($_GET['getmodule']) ? $_GET['getmodule'] : 'modConnexion';
switch ($getmodule) {
    case 'modEnnemis':
        include_once './module/mod_ennemi/modele_ennemi.php';
        $module = new ModJoueurs;
        break;
    case 'modUstensile':
        include_once './module/mod_ustensile/modele_ustensile.php';
        $module = new ModUstensile;
        break;
    case 'modBonus' :
        include_once './module/mod_bonus/modele_bonus.php';
        $module = new ModBonus;
        break;
    case 'modClassement' :
        include_once './module/mod_classement/mod_classement.php';
        echo'classement';
        $module = new ModClassement();
        $module->exec();
        break;
    case 'modNiveaux' :
        include_once './module/mod_niveaux/modele_niveaux.php';
        $module = new ModNiveaux;
        break;
    case 'modProfil' : 
        include_once './module/mod_profil/modele_profil.php';
        $module = new ModProfil;
        break;
    case 'modUnivers' :
        include_once './module/mod_univers/modele_univers.php';
        $module = new ModUnivers;
        break;
    case 'modConnexion':
        include_once './module/mod_connexion/modele_connexion.php';
        $module = new ModConnexion;
        break;
    default : break;
}

//données dynamiques//
$pageTitle = "Cakey";
$tampon = $vueGenerique->getAffichage();
//fin données dynamiques//

include_once './template.php';

?>