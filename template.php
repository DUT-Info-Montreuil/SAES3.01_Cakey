<!DOCTYPE html>
<html lang="fr">
<!---head--->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?></title>
</head>
<!---body--->
<body>
<!---header--->
<header>
<p> Dans le header</p>


<?php
/* PARTIE A RAJOUTER POUR CONNECTER UN UTILISATEUR
if(isset($_SESSION["newsession"])){
?> <a href="index.php?getmodule=modConnexion&action=deconnexion">Deconnexion</a> <?php }
else {
    $controller = new ControllerConnexion(new VueConnexion(), new ModeleConnexion());
    $controller->formulaireConnexion();
}
*/
?>
</header>
<!---menu--->
<nav>
<?php
$compMenu = new ControllerCompMenu(new VueCompMenu);
$compMenu->exec();
?>
</nav>

<!---main--->
<main>
<?= $tampon ?>
</main>

<!---footer--->
<footer>
<p> Dans le footer</p>

<p> Mes coordonnées ...</p>
<p> Infos légales ... </p>
</footer>
</body>
</html>