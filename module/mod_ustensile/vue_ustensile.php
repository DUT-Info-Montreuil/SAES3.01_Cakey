<?php class VueUstensile extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    public function afficherUstensiles($tabUstensiles){
        echo "dans afficher ustensile";
        foreach($tabUstensiles as $ustensile){
                    ?>      

                    <table style="border: 3px solid pink; margin-bottom: 20px;">                
                        <tr>  <?php echo $ustensile["nomTour"]; ?> </tr>

                        <tbody>
                            <tr>
                            <img src="<?= $ustensile["pathImageTour"] ?>" alt="image de l'ustensile" style="width: 100px; height: 100px;">
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
    <?php
        }
    }


    public function trierUstensiles(){ ?>
        <div class="sorting-container">
            <p class="sorting-label">Trier par</p>
            <div class="sorting-buttons-container">
                <a href="index.php?getmodule=modUstensile&sort=nomTour" class="sorting-button">Nom</a>
                <a href="index.php?getmodule=modUstensile&sort=PV desc" class="sorting-button">PV</a>
                <a href="index.php?getmodule=modUstensile&sort=pointsAttaque desc" class="sorting-button">Attaque</a>
                <a href="index.php?getmodule=modUstensile&sort=porteeAttaque desc" class="sorting-button">Porte d'attaque</a>
                <a href="index.php?getmodule=modUstensile&sort=prixAchat asc" class="sorting-button">Prix</a>
                <a href="index.php?getmodule=modUstensile&sort=niveau asc" class="sorting-button">Niveau d'amélioration</a>
            </div>
        </div>
    <?php
    }
    
}
    
    ?>