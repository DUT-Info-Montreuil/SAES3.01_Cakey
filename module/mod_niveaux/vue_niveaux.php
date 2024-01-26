<?php class VueNiveau extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function afficherNiveaux($tabNiveau){
    echo '<div class="d-flex flex-wrap">';
    foreach($tabNiveau as $niveau){
        $classeNiveau = $niveau["exist"] ? "universItem niveau-item itemExist" : "universItem niveau-item itemAVenir";
?>
        <div class="niveau <?= $classeNiveau ?>">
            <?php if ($classeNiveau === "itemAVenir"): ?>
                <div class="alert alert-info" role="alert">
                    Bientôt disponible
                </div>
            <?php endif; ?>

            <div class="card-niveau">
                <h5 class="card-title-niveau"><?= "Niveau " . $niveau["numeroNiveau"] ?></h5>
                <!-- Ajoutez une image pour le niveau si vous en avez une -->
                <div class="card-img-top-niveau"></div>
                <div class="card-body-niveau">
                    <p class="caracteristique-niveau"><span style="color: #e91e63;">Nombre d'ennemis dans ce niveau:</span> <span style="color: black;"><?= $niveau["nbEnnemis"] ?></span></p>
                    <p class="caracteristique-niveau"><span style="color: #e91e63;">Argent bonbon pour ce niveau:</span> <span style="color: black;"><?= $niveau["argentBonbon"] ?></span></p>
                    <p class="caracteristique-niveau"><span style="color: #e91e63;">Ce niveau vous donnera:</span> <span style="color: black;"><?= $niveau["XPgagnees"] . " XP, " ?><span style="color: black;"><?= $niveau["ChocolatGagne"] . " chocolats" ?></span></p>
                    <div class="hr-divider-niveau"></div>
                </div>
            </div>
        </div>
<?php
    }
    echo '</div>'; // Ferme le conteneur flexible
}




public function trierNiveaux(){ ?>
        
    <p>Trier par</p>
    <a href="index.php?getmodule=modNiveau&sort=numeroNiveau">Numero</a> | 
    <a href="index.php?getmodule=modNiveau&sort=nbEnnemis asc">Nombre d'ennemis</a> |
    <a href="index.php?getmodule=modNiveau&sort=argentBonbon desc">Récompense Bonbon</a> |
    <a href="index.php?getmodule=modNiveau&sort=ChocolatGagne desc">Récompense Chocolat</a> |
    <a href="index.php?getmodule=modNiveau&sort=idTour">Tour gagnée</a> |
    <a href="index.php?getmodule=modNiveau&sort=XPgagnees desc">XP gagnés</a> |
    <a href="index.php?getmodule=modNiveau&sort=exist">Disponibilité</a> |

<?php
}
}

?>