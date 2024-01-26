<?php class VueUstensile extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    public function afficherUstensiles($tabUstensiles){
        echo '<div class="d-flex flex-wrap">';
        foreach($tabUstensiles as $ustensile){

    ?>
    
                <div class="card-ustensile">
                    <h5 class="card-title-ustensile"><?= $ustensile["nomTour"] ?></h5>
                    <img src="<?= $ustensile["pathImageTour"] ?>" class="card-img-top-ustensile" alt="image de l'ustensile">
                    <div class="card-body-ustensile">
                        <p class="caracteristique-ustensile">NIVEAU: <?= $ustensile["niveau"] ?></p>
                        <p class="caracteristique-ustensile">pointsAttaque: <?= $ustensile["pointsAttaque"] ?></p>
                        <p class="caracteristique-ustensile">PV: <?= $ustensile["pv"] ?></p>
                        <p class="caracteristique-ustensile">prix d'achat: <?= $ustensile["prixAchat"] ?></p>
                        <div class="hr-divider-ustensile"></div>
                    </div>
                </div>
            </div>
    <?php
        }
        echo '</div>'; 
    }
    


    public function trierUstensiles(){ ?>
        <div class="sorting-container">
            <p class="sorting-label">Trier par</p>
            <div class="sorting-buttons-container">
                <a href="index.php?getmodule=modUstensile&sort=nomTour" class="sorting-button">Nom</a>
                <a href="index.php?getmodule=modUstensile&sort=PV desc" class="sorting-button">PV</a>
                <a href="index.php?getmodule=modUstensile&sort=pointsAttaque desc" class="sorting-button">Attaque</a>
                <a href="index.php?getmodule=modUstensile&sort=porteeAttaque desc" class="sorting-button">Porte d'attaque</a>
                <a href="index.php?getmodule=modUstensile&sort=prixAchat asc" class="sorting-button">Prix</a>
                <a href="index.php?getmodule=modUstensile&sort=niveau asc" class="sorting-button">Niveau d'amélioration</a>
            </div>
        </div>
    <?php
    }
    
}
    
    ?>