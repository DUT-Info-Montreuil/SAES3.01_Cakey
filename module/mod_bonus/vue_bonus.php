<?php class VueBonus extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function afficherBonus($tabBonus){
    echo '<div class="d-flex flex-wrap">';
    foreach($tabBonus as $bonus){
?>
      
            <div class="card-bonus">
                <h5 class="card-title-bonus"><?= strtoupper($bonus["nomBonus"]) ?></h5>
                <img src="<?= $bonus["pathImageBonus"] ?>" class="card-img-top-bonus" alt="image de <?= $bonus["nomBonus"] ?>">
                <div class="card-body-bonus">
                    <p class="caracteristique-bonus">Prix Chocolat: <?= $bonus["prixEnChocolat"] ?></p>
                    <p class="caracteristique-bonus"><?= "Le " . $bonus['nomBonus'] . " " . $bonus['description'] ?></p>
                    <div class="hr-divider-bonus"></div>
                </div>
            </div>
        </div>
<?php
    }
    echo '</div>'; 
}




public function trierBonus(){ ?>
    <div class="sorting-container">
        <p class="sorting-label">Trier par</p>
        <div class="sorting-buttons-container">
            <a href="index.php?getmodule=modBonus&sort=nomBonus" class="sorting-button">Nom</a>
            <a href="index.php?getmodule=modBonus&sort=prixEnChocolat" class="sorting-button">Prix</a>
        </div>
    </div>
<?php
}

}

?>