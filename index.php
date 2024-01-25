<?php session_start();

include_once './connexion.php';
include_once './vueGenerique.php';

include_once './module/mod_ennemi/cont_ennemi.php';
include_once './module/mod_ennemi/modele_ennemi.php';
include_once './module/mod_ennemi/vue_ennemi.php'; 

include_once './module/mod_niveaux/cont_niveaux.php';
include_once './module/mod_niveaux/modele_niveaux.php';
include_once './module/mod_niveaux/vue_niveaux.php'; 

include_once './module/mod_profil/cont_profil.php'; 
include_once './module/mod_profil/modele_profil.php';
include_once './module/mod_profil/vue_profil.php'; 

include_once './module/mod_univers/cont_univers.php';  
include_once './module/mod_univers/modele_univers.php';
include_once './module/mod_univers/vue_univers.php';

include_once './module/mod_ustensile/cont_ustensile.php';  
include_once './module/mod_ustensile/modele_ustensile.php';
include_once './module/mod_ustensile/vue_ustensile.php'; 

include_once './module/mod_bonus/cont_bonus.php';
include_once './module/mod_bonus/modele_bonus.php';
include_once './module/mod_bonus/vue_bonus.php'; 

include_once './module/mod_classement/cont_classement.php';
include_once './module/mod_classement/modele_classement.php';
include_once './module/mod_classement/vue_classement.php'; 

include_once './module/mod_connexion/cont_connexion.php';
include_once './module/mod_connexion/modele_connexion.php';
include_once './module/mod_connexion/vue_connexion.php';

include_once './module/mod_accueil/vue_accueil.php';


include_once './composants/menuHeader/vueCompMenu.php';
include_once './composants/menuHeader/controllerCompMenu.php';
include_once './composants/menuFooter/vueCompFooter.php';
include_once './composants/menuFooter/controllerCompFooter.php';

Connexion::initConnexion();

$vueGenerique = new VueGenerique();
$getmodule = isset($_GET['getmodule']) ? $_GET['getmodule'] : 'modAccueil';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'nom';
switch ($getmodule) {
    case 'modAccueil' :
        include_once './module/mod_accueil/mod_accueil.php';
        $module = new ModAccueil;
        break;
    case 'modEnnemi':
        include_once './module/mod_ennemi/mod_ennemi.php';
        $module = new ModEnnemi($sort);
        break;
    case 'modUstensile' :
        include_once './module/mod_ustensile/mod_ustensile.php';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'niveau';
        $module = new ModUstensile($sort);
        break;
    case 'modBonus' :
        include_once './module/mod_bonus/mod_bonus.php';
        $module = new ModBonus($sort);
        break;
    case 'modClassement' :
        include_once './module/mod_classement/mod_classement.php';
        $module = new ModClassement;
        break;
    case 'modNiveau' :
        include_once './module/mod_niveaux/mod_niveaux.php';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'numeroNiveau';
        $module = new ModNiveau($sort);
        break;
    case 'modProfil' : 
        include_once './module/mod_profil/mod_profil.php';
        $module = new ModProfil;
        break;
    case 'modUnivers' :
        include_once './module/mod_univers/mod_univers.php';
        $module = new ModUnivers;
        break;
    case 'modConnexion':
        include_once './module/mod_connexion/mod_connexion.php';
        $module = new ModConnexion;
        break;
    default : die("Module inconnu");
}

//données dynamiques//
$pageTitle = "Cakey";
$tampon = $vueGenerique->getAffichage();
//fin données dynamiques//
include_once './template.php';

?>