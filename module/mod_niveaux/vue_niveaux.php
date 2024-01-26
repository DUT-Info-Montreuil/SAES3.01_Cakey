<?php class VueNiveau extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function afficherNiveaux($tabNiveau){
        foreach($tabNiveau as $niveau){

       
        ?>      

       <table style="border: 3px solid pink; margin-bottom: 20px;">                
            <tr>  <?php echo "Niveau " .$niveau["numeroNiveau"]; ?> </tr>

            <tbody>
                <tr>
                    <img src="" alt="image du niveau">
                </tr>
                <tr>
                    <td><span style="color: red;">nombre d'ennemis dans ce niveau : </span></td>
                    <td><?php echo $niveau["nbEnnemis"]; ?></td>
                    <!-- possibilité d'afficher le nb d'ennemis par niveau -->
                </tr>
                <tr>
                    <td><span style="color: red;">Argent bonbon pour ce niveau : </span></td>
                    <td><?php echo $niveau["argentBonbon"]; ?></td>
                </tr>
                <tr>
                    <td><span style="color: red;">Ce niveau vous donnera : </span></td>
                    <td><?php echo $niveau["XPgagnees"] . "XP"; ?></td>
                    <td><?php echo $niveau["ChocolatGagne"] . "chocolats"; ?></td>

           </tr>
            <tbody>
            </tr>
        </table>
    </div>
<?php
    }
}

public function trierNiveaux(){ ?>
    <div class="sorting-container">
        <p class="sorting-label">Trier par</p>
        <div class="sorting-buttons-container">
            <a href="index.php?getmodule=modNiveau&sort=numeroNiveau" class="sorting-button">Numero</a>
            <a href="index.php?getmodule=modNiveau&sort=nbEnnemis asc" class="sorting-button">Nombre d'ennemis</a>
            <a href="index.php?getmodule=modNiveau&sort=argentBonbon desc" class="sorting-button">Récompense Bonbon</a>
            <a href="index.php?getmodule=modNiveau&sort=ChocolatGagne desc" class="sorting-button">Récompense Chocolat</a>
            <a href="index.php?getmodule=modNiveau&sort=idTour" class="sorting-button">Tour gagnée</a>
            <a href="index.php?getmodule=modNiveau&sort=XPgagnees desc" class="sorting-button">XP gagnés</a>
        </div>
    </div>
<?php
}


}

?>