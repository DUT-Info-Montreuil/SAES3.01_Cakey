<?php class VueBonus extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function afficherBonus($tabBonus){
    echo '<div class="d-flex flex-wrap">';
    foreach($tabBonus as $bonus){
        $classeBonus = $bonus["exist"] ? "universItem bonus-item itemExist" : "universItem bonus-item itemAVenir";
?>
        <div class="bonus <?= $classeBonus ?>">
            <?php if ($classeBonus === "itemAVenir"): ?>
                <div class="alert alert-info" role="alert">
                    Bientôt disponible
                </div>
            <?php endif; ?>

            <div class="card-bonus">
                <h5 class="card-title-bonus"><?= strtoupper($bonus["nom"]) ?></h5>
                <img src="<?= $bonus["pathImageBonus"] ?>" class="card-img-top-bonus" alt="image de <?= $bonus["nom"] ?>">
                <div class="card-body-bonus">
                    <p class="caracteristique-bonus">Prix Chocolat: <?= $bonus["prixEnChocolat"] ?></p>
                    <p class="caracteristique-bonus"><?= "Le " . $bonus['nom'] . " " . $bonus['description'] ?></p>
                    <div class="hr-divider-bonus"></div>
                </div>
            </div>
        </div>
<?php
    }
    echo '</div>'; // Ferme le conteneur flexible
}




public function trierBonus(){ ?>
    Trier par
    <a href="index.php?getmodule=modBonus&sort=nom">Nom</a> | 
    <a href="index.php?getmodule=modBonus&sort=prixEnChocolat">Prix</a> |
    <a href="index.php?getmodule=modBonus&sort=exist">Disponibilité</a> |

<?php
}
}

?>