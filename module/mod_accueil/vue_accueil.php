<?php class VueAccueil extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function page(){
    echo ' 
    <html>
        <head>
            <title>Page</title>
            <meta charset="utf-8">
          
        </head>
        <body>
            <div class ="histoire">
                <div class="imgText">
                    <img src ="ressources/accueil/coeur.png">
                    <p>Nouveautés</p>
                </div>
                <h3>L\'univers et l\'histoire de Cakey</h3>
                </br>
                </br>
                </br>
                <p>Bienvenue chez Cakay ! Dans ce jeu de type tower defense, tu essayes de cusiner un gâteau. 
                Mais des ennemis veulent t\'en empêcher ! Tu vas devoir affronter des patates, des poissons, des petits pois et tant d\'autres qui essayent de gâcher ton délicieux gâteau
                Pour les empêcher d\'atteindre ton saladier, tu peux utiliser différents instrument de cuisine, des couteaux, des fouets etc. 
                </p>
            </div>
            <div class="gameplayVideo">
                <video width="640" height="480" controls>
                    <source src="ressources/accueil/gameplayGakey.ogx" type="video/ogg"> 
                </video>
            </div>
            <!--IL FAUT ENLEVER LES </BR> ET REGLER LE PROBLEME DE LA VIDEO MAL ALLIGNER-->
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
        </body>
    </html>';    
}

}