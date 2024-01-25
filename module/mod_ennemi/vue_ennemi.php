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
                        <img src="" alt="image de l'ennemi">
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
    <form id="formTrierEnnemis" class ="formTri" method="post" enctype="multipart/form-data" action="">
        <label for="bientotDispo"> bientot dispo </label>
        <input type="checkbox" id="bientotDispo" name="bientotDispo">
        <label for="dansLeJeu"> déjà dans le jeu </label>
        <input type="checkbox" id="dansLeJeu" name="dansLeJeu">
        <label for="PVDesc">PV</label>
        <input type="checkbox" id="PVDesc" name="PVDesc">
        <button>Trier</button>
        <button type="reset" name="reset">Supprimer les filtres </button>
        Trier par : <a href="/index.php?getmodule=modEnnemi&sort=nom">Nom</a> | <a href="/index.php?getmodule=modEnnemi&sort=pv">PV</a>
    </form>
    <?php
    }
    }
?>

<!-- pr savoir de quelle manière on trie on parcourt le DOM en JS 
regarder si le selecteur est cochée regarder comment en jquery comment on sait si tel ou tel checkbow est cochée
selon la checkbox cochée, j'envoie tel ou tel param pour ma requête ajax -->