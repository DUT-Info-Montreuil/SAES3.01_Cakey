<?php class VueBonus extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function afficherBonus($tabBonus){
    foreach($tabBonus as $bonus){
        ?>      
        <table style="border: 3px solid pink; margin-bottom: 20px;">                
            <tr>  <?php echo strtoupper($bonus["nomBonus"]); ?> </tr>

            <tbody>
                <tr>
                <img src="<?= $bonus["pathImageBonus"] ?>" alt="image de <?= $bonus["nomBonus"] ?>" style="width: 100px; height: 100px;">
                </tr>
                <tr>
                    <td><span style="color: red;">Prix Chocolat:</span></td>
                    <td><?php echo $bonus["prixEnChocolat"]; ?></td>
                </tr>
                <tr>
                    <td><?php echo "Le " . $bonus['nomBonus']. " ".$bonus['description']; ?></td>
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
            <a href="index.php?getmodule=modBonus&sort=nomBonus" class="sorting-button">Nom</a>
            <a href="index.php?getmodule=modBonus&sort=prixEnChocolat" class="sorting-button">Prix</a>
        </div>
    </div>
<?php
}

}

?>