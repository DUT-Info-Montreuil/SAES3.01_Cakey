<?php class VueEnnemi extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    public function afficherEnnemis($tabEnnemis){
        foreach($tabEnnemis as $ennemi){
    ?>      

            <table style="border: 3px solid pink; margin-bottom: 20px;" class="tabEnnemi">                
                <tr>  <?php echo strtoupper($ennemi["nomEnnemi"]); ?> </tr>

                <tbody>
                    <tr>
                    <img src="<?= $ennemi["pathImageEnnemi"] ?>" alt="image de <?= $ennemi["nomEnnemi"] ?>" style="width: 100px; height: 100px;">
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
                <tbody>
            </table>
        </div>
    <?php
        }
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
