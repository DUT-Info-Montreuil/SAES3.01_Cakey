<?php class VueGenerique{

    public function __construct(){
        ob_start();
    }

    public function getAffichage(){
        return ob_get_clean();
    }

    public function header(){
        echo '
        <html>
            <head>
                <title>Page</title>
                <meta charset="utf-8">
                <!--<link rel="stylesheet" href="style.css"> -->
                <link rel="stylesheet" href="css/bootstrap.css">        
            </head>
            <body>
                <nav>
                    <ul class ="menu">
                        <li class="logo" href="accueil.html">
                            <a href="index.php?getmodule=modAccueil&action=page"><img src="Ressources/gateaux.png"/>CAKEY</a>
                        </li>
                        <li>
                            <a href ="index.php?getmodule=modAccueil&action=page">Accueil</a>
                        </li>
                        <li class="ongletUnivers"><a href="#">Univers &ensp;</a>
                            <ul class="sousOngletsUnivers">
                                <li><a href = "#">Ennemi</a></li>
                                <li><a href = "#">Ustensiles</a></li>
                                <li><a href = "#">Niveaux</a></li>
                                <li><a href = "#">Bonus</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="classement.html">Classement</a>
                        </li>
                        <li class="barreRecherche">
                            <input type="text" maxlength="20" placeholder="Rechercher" class="searchbar" />
                            <img src="https://images-na.ssl-images-amazon.com/images/I/41gYkruZM2L.png" alt="search icon" class="button" />
                        </li>
                        <li>
                            <a href ="index.php?getmodule=modConnexion&action=formulaireInscription">Inscription</a>
                        </li>
                        <li>
                            <a href ="index.php?getmodule=modConnexion&action=formulaireConnexion">Connexion</a>
                        </li>
                    </ul>
                </nav>
            </body>    
        </html>';               
    }

    public function footer(){
        echo '
        <html>
            <body>
                <footer>
                <ul class="footer">
                    <li><a href = "#">Autres jeux de Cakey Group</a></li>
                    <li><a href = "#">Team</a></li>
                    <li><a href = "#">Terms</a></li>
                    <li><a href = "#">Privacy</a></li>
                    <li><a href = "#">Cookies</a></li>
                </ul>
                <ul class="icon">
                    <li><a href="#"><img src="Ressources/facebookIcon.png"></a></li>
                    <li><a href="#"><img src="Ressources/twitterIcon.png"></a></li>
                    <li><a href="#"><img src="Ressources/InstagramIcon.png"></a></li>
                </ul>
            </footer>

                <!--<script src="js/bootstrap.js"></script>-->
                <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        </body>
    </html>
        ';
    }

}

?>