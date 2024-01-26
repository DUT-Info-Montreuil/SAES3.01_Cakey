<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/bootstrap.css">    
            <script src="lib/jquery-3.7.1.min.js"></script>
        <title><?= $pageTitle ?></title>
    
    </head>
    <!--BODY-->

    <body>
        <header>

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
        <!--MENU-->
            <nav>
                <?php
                    $compMenu = new ControllerCompMenu(new VueCompMenu);
                    $compMenu->exec();
                ?>
            </nav>
        </header>




        <script>

        </script>

      

      <main style="height: 1500px; padding-left: 10px;">
            <?= $tampon ?>
        </main>
  
        <!--FOOTER-->
=======
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">  
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="script.js"></script>
       <title><?= $pageTitle ?></title>
    </head>
    <body>
        <header>
            <?php
                $compMenu = new ControllerCompMenu(new VueCompMenu , new ModeleCompMenu);
                $compMenu->exec();
            ?>
        </header>
        <div class="imagedefond">
            <main>
                <?= $tampon ?>
            </main>
        </div>
        
        <footer>
            <?php
                $compFooter = new ControllerCompFooter(new VueCompFooter);
                $compFooter->exec();
            ?>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
