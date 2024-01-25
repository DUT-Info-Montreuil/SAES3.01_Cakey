<?php class VueUstensile extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    public function afficherUstensiles($tabUstensiles){
        echo '<div class="d-flex flex-wrap">';
        foreach($tabUstensiles as $ustensile){
            $classeUstensile= $ustensile["exist"] ? "universItem ustensile-item itemExist" : "universItem ustensile-item itemAVenir";
    ?>
            <div class="ustensile <?= $classeUstensile ?>">
                <?php if ($classeUstensile === "itemAVenir"): ?>
                    <div class="alert alert-info" role="alert">
                        Bientôt disponible
                    </div>
                <?php endif; ?>
    
                <div class="card-ustensile">
                    <h5 class="card-title-ustensile"><?= $ustensile["nom"] ?></h5>
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
        echo '</div>'; // Ferme le conteneur flexible
    }
    


    public function trierUstensiles(){ ?>
        
        <p>Trier par</p>
        <a href="index.php?getmodule=modUstensile&sort=nom">Nom</a> | 
        <a href="index.php?getmodule=modUstensile&sort=PV desc">PV</a> |
        <a href="index.php?getmodule=modUstensile&sort=pointsAttaque desc">Attaque</a> |
        <a href="index.php?getmodule=modUstensile&sort=porteeAttaque desc">Porte d'attaque</a> |
        <a href="index.php?getmodule=modUstensile&sort=prixAchat asc">Prix</a> |
        <a href="index.php?getmodule=modUstensile&sort=niveau asc">Niveau d'amélioration</a> |
        <a href="index.php?getmodule=modUstensile&sort=exist">Disponibilité</a> |

    <?php
    }
}
    
    ?>