<?php class VueUstensile extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function afficherUstensiles($tabUstensiles){
    echo "dans afficher ustensile";
    foreach($tabUstensiles as $ustensile){
        // if($ustensile["niveau"] == 1):
                $classeUstensile= $ustensile["exist"] ? "universItem ustensile-item itemExist" : "universItem ustensile-item itemAVenir";
                ?>      

            <div class="ustensile <?= $classeUstensile ?>">
                <?php if ($classeUstensile === "itemAVenir"): ?>
                        <tr>
                            <td colspan="2">Bientôt disponible</td>
                        </tr>
                    <?php endif; ?>

                <table style="border: 3px solid pink; margin-bottom: 20px;">                
                    <!-- <tr>  <?php echo $ustensile["nom"] . " - Niveau 1"; ?> </tr> -->
                    <tr>  <?php echo $ustensile["nom"]; ?> </tr>


                    <tbody>
                        <tr>
                            <img src="" alt="image du niveau">
                        </tr>
                        <tr>
                            <td><span style="color: red;">NIVEAU: </span></td>
                            <td><?php echo $ustensile["niveau"]; ?></td>
                        </tr>
                        <tr>
                            <td><span style="color: red;">pointsAttaque: </span></td>
                            <td><?php echo $ustensile["pointsAttaque"]; ?></td>
                        </tr>
                        <tr>
                            <td><span style="color: red;">PV: </span></td>
                            <td><?php echo $ustensile["pv"]; ?></td>
                        </tr>
                        <tr>
                            <td><span style="color: red;">prix d'achat: </span></td>
                            <td><?php echo $ustensile["prixAchat"]; ?></td>
                    <tbody>
                    </tr>
                </table>
            </div>
            <!-- rajouter un php endif juste en dessous si je remet celui en haut -->
<?php
    }
}


public function trierUstensiles(){ ?>    
        <form id="formTrierUstensiles" class ="formTri" method="post" enctype="multipart/form-data" action="">
    
            <label for="bientotDispo"> bientot dispo </label>
            <input type="checkbox" id="bientotDispo" name="bientotDispo">
            
            <label for="dansLeJeu"> déjà dans le jeu </label>
            <input type="checkbox" id="dansLeJeu" name="dansLeJeu">
            

            <!-- NE FONCTIONNE PAS -->
            <label for="nom">NOM</label>
            <input type="checkbox" id="nom" name="nom">
           
            <button type="submit" name="submit">Trier</button>
            <button type="reset" name="reset">Supprimer les filtres </button>
    
        </form>
    <?php
        }
    }
    
    ?>