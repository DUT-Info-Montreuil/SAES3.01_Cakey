<?php class VueEnnemi extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    public function afficherEnnemis($tabEnnemis){
        echo '<div class="d-flex flex-wrap">';
        foreach($tabEnnemis as $ennemi){
            $classeEnnemi = $ennemi["exist"] ? "universItem ennemi-item itemExist" : "universItem ennemi-item itemAVenir";
    ?>
            <div class="ennemi <?= $classeEnnemi ?>">
                <?php if ($classeEnnemi === "itemAVenir"): ?>
                    <div class="alert alert-info" role="alert">
                        Bientôt disponible
                    </div>
                <?php endif; ?>
        
                <div class="card">
                    <h5 class="card-title"><?= strtoupper($ennemi["nom"]) ?></h5>
                    <img src="<?= $ennemi["pathImageEnnemi"] ?>" class="card-img-top" alt="image de <?= $ennemi["nom"] ?>">
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
        echo '</div>'; // Ferme le conteneur flexible
    }
    
    
    
    
    
    public function trierEnnemis(){ ?>
   
       
        <p>Trier par</p>
        <a href="index.php?getmodule=modEnnemi&sort=nom">Nom</a> | 
        <a href="index.php?getmodule=modEnnemi&sort=PV desc">PV</a> |
        <a href="index.php?getmodule=modEnnemi&sort=pointsAttaque desc">Attaque</a> |
        <a href="index.php?getmodule=modEnnemi&sort=recompense desc">Récompense Bonbons</a> |
        <a href="index.php?getmodule=modEnnemi&sort=exist">Disponibilité</a> |

    </form>
    <?php
    }
    
}
?>

<!-- pr savoir de quelle manière on trie on parcourt le DOM en JS 
regarder si le selecteur est cochée regarder comment en jquery comment on sait si tel ou tel checkbow est cochée
selon la checkbox cochée, j'envoie tel ou tel param pour ma requête ajax -->