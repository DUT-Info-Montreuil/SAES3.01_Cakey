<?php class VueNiveau extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function afficherNiveaux($tabNiveau){
    foreach($tabNiveau as $niveau){
        $classeNiveau= $niveau["exist"] ? "universItem niveau-item itemExist" : "universItem niveau-item itemAVenir";

        // echo "Niveau blabalbal $niveau[numeroNiveau]  exist : $niveau[exist]";
        ?>      

    </br>
        
    <div class="niveau <?= $classeNiveau ?>">
        <?php if ($classeNiveau === "itemAVenir"): ?>
                <tr>
                    <td colspan="2">Bientôt disponible</td>
                </tr>
            <?php endif; ?>

        <table style="border: 3px solid pink; margin-bottom: 20px;">                
            <tr>  <?php echo "Niveau " .$niveau["numeroNiveau"]; ?> </tr>

            <tbody>
                <tr>
                    <img src="" alt="image du niveau">
                </tr>
                <tr>
                    <td><span style="color: red;">nombre d'ennemis dans ce niveau : </span></td>
                    <td><?php echo $niveau["nbEnnemis"]; ?></td>
                    <!-- A CHANGER -->
                    <td><?php echo "FAIRE UNE METHODE POUR RECUP CB DENNEMIS DE QUEL TYPE ET AFFICHER CA"; ?></td>
                </tr>
                <tr>
                    <td><span style="color: red;">Argent bonbon pour ce niveau : </span></td>
                    <td><?php echo $niveau["argentBonbon"]; ?></td>
                </tr>
                <tr>
                    <td><span style="color: red;">Ce niveau vous donnera : </span></td>
                    <td><?php echo $niveau["XPgagnees"] . "XP"; ?></td>
                    <td><?php echo $niveau["ChocolatGagne"] . "chocolats"; ?></td>
                    <td><?php echo $niveau["idTour"] . "idTOUR"; ?></td>
                    <!-- A CHANGER -->
                    <td><?php echo "CI DESSUS l'ID de la tour debloquee : ne pas afficher l'idee mais l'image + nom cliquable qui redirigent si possible vers la page des tours"; ?></td>
                </tr>
            <tbody>
            </tr>
        </table>
    </div>
<?php
    }
}

public function trierNiveaux(){ ?>
        
    <p>Trier par</p>
    <a href="index.php?getmodule=modNiveau&sort=numeroNiveau">Numero</a> | 
    <a href="index.php?getmodule=modNiveau&sort=nbEnnemis asc">Nombre d'ennemis</a> |
    <a href="index.php?getmodule=modNiveau&sort=argentBonbon desc">Récompense Bonbon</a> |
    <a href="index.php?getmodule=modNiveau&sort=ChocolatGagne desc">Récompense Chocolat</a> |
    <a href="index.php?getmodule=modNiveau&sort=idTour">Tour gagnée</a> |
    <a href="index.php?getmodule=modNiveau&sort=XPgagnees desc">XP gagnés</a> |
    <a href="index.php?getmodule=modNiveau&sort=exist">Disponibilité</a> |

<?php
}
}

?>