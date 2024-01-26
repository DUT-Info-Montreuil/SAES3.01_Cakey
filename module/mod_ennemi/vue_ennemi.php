<?php class VueEnnemi extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    public function afficherEnnemis($tabEnnemis){
        echo '<div class="d-flex flex-wrap">';
        foreach($tabEnnemis as $ennemi){

    ?>
           
        
                <div class="card">
                    <h5 class="card-title"><?= strtoupper($ennemi["nomEnnemi"]) ?></h5>
                    <img src="<?= $ennemi["pathImageEnnemi"] ?>" class="card-img-top" alt="image de <?= $ennemi["nomEnnemi"] ?>">
                    <div class="card-body">
                        <p class="caracteristique">PV: <?= $ennemi["PV"] ?></p>
                        <p class="caracteristique">Portée Attaque: <?= $ennemi['porteeAttaque'] ?></p>
                        <p class="caracteristique">Points Attaque: <?= $ennemi['pointsAttaque'] ?></p>
                        <p class="caracteristique">Récompense: <?= $ennemi['recompense'] ?></p>
                        <div class="hr-divider"></div>
                    </div>
                </div>
            </div>
    <?php
        }
        echo '</div>';
    }
    
    
    
    
    
    public function trierEnnemis(){ ?>
        <div class="sorting-container">
            <p class="sorting-label">Trier par</p>
            <div class="sorting-buttons-container">
                <a href="index.php?getmodule=modEnnemi&sort=nomEnnemi" class="sorting-button">Nom</a>
                <a href="index.php?getmodule=modEnnemi&sort=PV desc" class="sorting-button">PV</a>
                <a href="index.php?getmodule=modEnnemi&sort=pointsAttaque desc" class="sorting-button">Attaque</a>
                <a href="index.php?getmodule=modEnnemi&sort=recompense desc" class="sorting-button">Récompense Bonbons</a>
            </div>
        </div>
    <?php
    }
    

    
    
}
?>
