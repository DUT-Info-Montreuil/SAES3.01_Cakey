<!DOCTYPE html>
<html lang="fr">
    <!--HEAD-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="stylesheet" href="style.css"> -->
        <link rel="stylesheet" href="css/bootstrap.css">    
            <script src="lib/jquery-3.7.1.min.js"></script>
            <script src="ajax/script.js"></script>
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
            // Votre code jQuery ici
            $(document).ready(() => {
                // Votre code jQuery à exécuter lorsque le document est prêt
                $(".formTri").submit(function(e) {                    
                    console.log("Bouton Trier cliqué !");  
                    console.log("Formulaire soumis");
                  // Empêcher la soumission par défaut du formulaire
                    e.preventDefault();

                    // Récupérer l'état des cases à cocher
                    var bientotDispoChecked = $("#bientotDispo").prop("checked");
                    var dansLeJeuChecked = $("#dansLeJeu").prop("checked");
                    var trierParPV = $("#PVDesc").prop("checked");

                    // Masquer tous les éléments ennemi
                    $(".universItem").hide();

                    // Afficher les éléments en fonction des cases cochées
                    if (bientotDispoChecked) {
                        $(".itemAVenir").show();
                    }
                    if (dansLeJeuChecked) {
                        $(".itemExist").show();
                    }

                    if (trierParPV) {
                        var ennemis = $(".ennemi-item").clone();
                        ennemis.sort(function(a, b) {
                            var pvA = parseInt($(a).find(".PVvalue").text());
                            console.log(pvA);
                            var pvB = parseInt($(b).find(".PVvalue").text());
                            console.log(pvB);

                            return pvB - pvA;
                        });

                        $(".ennemi").empty().append(ennemis);
                        console.log("Ennemis triés : ", ennemis);
                        


                        console.log("Après ajout à .ennemi :", $(".ennemi"));                        
                        console.log("tri TERMINE");


                        // $(".tabEnnemi").html(ennemis);
                        //$(".tabEnnemi").append(ennemis);
                    }


                });

                $("#formTrierUstensiles").submit(function(e) {    
                        e.preventDefault();

                        // Récupérer l'état des cases à cocher
                        var bientotDispoChecked = $("#bientotDispo").prop("checked");
                        var dansLeJeuChecked = $("#dansLeJeu").prop("checked");
                        var trierParPV = $("#nom").prop("checked");

                        // Masquer tous les éléments ennemi
                        $(".ennemi-item").hide();

                        // Afficher les éléments en fonction des cases cochées
                        if (bientotDispoChecked) {
                            $(".ustensileAVenir").show();
                        }
                        if (dansLeJeuChecked) {
                            $(".ustensileExist").show();
                        }

                        //NE FONCTIONNE PAS ENCORE
                        if (nomChecked) {
                        }

            });
            });
        </script>
      
      <!-- style="background-color : purple" -->

      <main style="height: 1500px; padding-left: 10px;">
            <?= $tampon ?>
        </main>
  
        <!--FOOTER-->
        <footer>
            <?php
                $compFooter = new ControllerCompFooter(new VueCompFooter);
                $compFooter->exec();
            ?>
        </footer>
            <!-- <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>