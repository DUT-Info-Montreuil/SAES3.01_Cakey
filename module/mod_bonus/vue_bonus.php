<?php class VueBonus extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function afficherBonus($tabBonus){
    foreach($tabBonus as $bonus){
        $classeBonus= $bonus["exist"] ? "universItem bonus-item itemExist" : "universItem bonus-item itemAVenir";
        ?>      

    <div class="bonus <?= $classeBonus ?>">
        <?php if ($classeBonus === "itemAVenir"): ?>
                <tr>
                    <td colspan="2">Bientôt disponible</td>
                </tr>
            <?php endif; ?>

        <table style="border: 3px solid pink; margin-bottom: 20px;">                
            <tr>  <?php echo strtoupper($bonus["nom"]); ?> </tr>

            <tbody>
                <tr>
                <img src="<?= $bonus["pathImageBonus"] ?>" alt="image de <?= $bonus["nom"] ?>" style="width: 100px; height: 100px;">
                </tr>
                <tr>
                    <td><span style="color: red;">Prix Chocolat:</span></td>
                    <td><?php echo $bonus["prixEnChocolat"]; ?></td>
                </tr>
                <tr>
                    <td><?php echo "Le " . $bonus['nom']. " ".$bonus['description']; ?></td>
                </tr>
            <tbody>
        </table>
    </div>
<?php
    }
}


public function trierBonus(){ ?>
    <div class="sorting-container">
        <p class="sorting-label">Trier par</p>
        <div class="sorting-buttons-container">
            <a href="index.php?getmodule=modBonus&sort=nom" class="sorting-button">Nom</a>
            <a href="index.php?getmodule=modBonus&sort=prixEnChocolat" class="sorting-button">Prix</a>
        </div>
    </div>
<?php
}

}

?>