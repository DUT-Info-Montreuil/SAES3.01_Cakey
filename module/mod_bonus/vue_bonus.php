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
                    <img src="" alt="image du bonus">
                </tr>
                <tr>
                    <td><span style="color: red;">prix Chocolat:</span></td>
                    <td><?php echo $bonus["prixEnChocolat"]; ?></td>
                </tr>
                <tr>
                    <td><?php echo $bonus['description']; ?></td>
                </tr>
            <tbody>
        </table>
    </div>
<?php
    }
}

public function trierBonus(){ ?>
<form id="formTrierBonus" class ="formTri" method="post" enctype="multipart/form-data" action="">

    <label for="bientotDispo"> bientot dispo </label>
    <input type="checkbox" id="bientotDispo" name="bientotDispo">
    
    <label for="dansLeJeu"> déjà dans le jeu </label>
    <input type="checkbox" id="dansLeJeu" name="dansLeJeu">
   
    <button type="submit" name="submit">Trier</button>
    <button type="reset" name="reset">Supprimer les filtres </button>

</form>
<?php
}
}

?>