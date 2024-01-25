<?php class VueEnnemi extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    public function afficherEnnemis($tabEnnemis){
        foreach($tabEnnemis as $ennemi){
            $classeEnnemi = $ennemi["exist"] ? "universItem ennemi-item itemExist" : "universItem ennemi-item itemAVenir";
    ?>      
    
        <div class="ennemi <?= $classeEnnemi ?>">
            <?php if ($classeEnnemi === "itemAVenir"): ?>
                    <tr>
                        <td colspan="2">Bientôt disponible</td>
                    </tr>
                <?php endif; ?>

            <table style="border: 3px solid pink; margin-bottom: 20px;" class="tabEnnemi">                
                <tr>  <?php echo strtoupper($ennemi["nom"]); ?> </tr>

                <tbody>
                    <tr>
                    <img src="<?= $ennemi["pathImageEnnemi"] ?>" alt="image de <?= $ennemi["nom"] ?>" style="width: 100px; height: 100px;">
                    </tr>
                    <tr>
                        <td><span style="color: red;">PV:</span></td>
                        <td class="PVvalue"><?php echo $ennemi["PV"]; ?></td>
                    </tr>
                    <tr>
                        <td><span style="color: red;">Portée Attaque:</span></td>
                        <td><?php echo $ennemi['porteeAttaque']; ?></td>
                    </tr>
                    <tr>
                        <td><span style="color: red;">Points Attaque:</span></td>
                        <td><?php echo $ennemi['pointsAttaque']; ?></td>
                    </tr>
                    <tr>
                        <td><span style="color: red;">Récompense:</span></td>
                        <td><?php echo $ennemi['recompense']; ?></td>
                    </tr>
                    <tr>
                        <td><span style="color: red;">EXIST:</span></td>
                        <td><?php echo $ennemi['exist']; ?></td>
                    </tr>
                <tbody>
            </table>
        </div>
    <?php
        }
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