<?php class VueGenerique{

    public function __construct(){
        ob_start();
    }

    public function getAffichage(){
        return ob_get_clean();
    }

    public function header(){
        echo'
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
                            <a href="accueil.html"><img src="Ressources/gateaux.png"/>CAKEY</a>
                        </li>
                        <li>
                            <a href ="accueil.html">Accueil</a>
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
                            <a href ="#">Inscription</a>
                        </li>
                        <li>
                            <a href ="#">Connexion</a>
                        </li>
                    </ul>
                </nav>
        </html>
        '               
    }

}

?>