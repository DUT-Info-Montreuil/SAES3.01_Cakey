<?php class VueNiveau extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function afficherNiveaux($tabNiveau){
    echo '<div class="d-flex flex-wrap">';
    foreach($tabNiveau as $niveau){
?>

            <div class="card-niveau">
                <h5 class="card-title-niveau"><?= "Niveau " . $niveau["numeroNiveau"] ?></h5>
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
    echo '</div>'; 
}




public function trierNiveaux(){ ?>
    <div class="sorting-container">
        <p class="sorting-label">Trier par</p>
        <div class="sorting-buttons-container">
            <a href="index.php?getmodule=modNiveau&sort=numeroNiveau" class="sorting-button">Numero</a>
            <a href="index.php?getmodule=modNiveau&sort=nbEnnemis asc" class="sorting-button">Nombre d'ennemis</a>
            <a href="index.php?getmodule=modNiveau&sort=argentBonbon desc" class="sorting-button">Récompense Bonbon</a>
            <a href="index.php?getmodule=modNiveau&sort=ChocolatGagne desc" class="sorting-button">Récompense Chocolat</a>
            <a href="index.php?getmodule=modNiveau&sort=idTour" class="sorting-button">Tour gagnée</a>
            <a href="index.php?getmodule=modNiveau&sort=XPgagnees desc" class="sorting-button">XP gagnés</a>
        </div>
    </div>
<?php
}


}

?>