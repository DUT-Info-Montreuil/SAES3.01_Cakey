<?php class VueAccueil extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function page(){
   
    echo '
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="histoire" style="width: 100%;">
                <div class="imgText d-flex align-items-center">
                    <img src="Ressources/coeur.png" class="img-fluid" alt="Coeur">
                </div>
                <h3 class="text-center">L\'univers et l\'histoire de Cakey</h3>
                <p>Bienvenue chez Cakay ! Dans ce jeu de type tower defense, tu essayes de cusiner un gâteau. 
                Mais des ennemis veulent t\'en empêcher ! Tu vas devoir affronter des patates, des poissons, des petits pois et tant d\'autres qui essayent de gâcher ton délicieux gâteau
                Pour les empêcher d\'atteindre ton saladier, tu peux utiliser différents instrument de cuisine, des couteaux, des fouets etc. 
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="gameplayVideo">

                <video class="responsive-video" width="100%" height="auto" controls>
                    <source src="Ressources/gameplayGakey.ogx" type="video/ogg">
                </video>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="Telechargement">
                <a class="lienJeu" href="https://drive.google.com/drive/u/0/folders/1B1SwAYAbnX6UHVS0bPmXEE-KaxiweCzj">Télécharger</a>
            </div>
        </div>
    </div>
</div>
    
    ';
}

}