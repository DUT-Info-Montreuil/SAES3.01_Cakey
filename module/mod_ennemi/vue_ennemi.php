<?php class VueEnnemi extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    public function bienvenue(){
        echo "bienvenue sur la page des ennemis";
    }

    public function afficherEnnemis($tabEnnemis){
        foreach($tabEnnemis as $ennemi){
            echo $ennemi["nom"];
    ?>
            <table style="border: 3px solid pink; margin-bottom: 20px;">
                
                <tr><img src="" alt="image de l'ennemi"></tr>
                <tr>
                    <td><span style="color: red;">PV:</span></td>
                    <td><?php echo $ennemi["PV"]; ?></td>
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
            </table>
    <?php
        }
    }
    



    public function menuEnnemi(){
?>
		<ul>
            <li><a href="index.php?getmodule=modEnnemi&action=bienvenue">Bienvenue</a></li>
            <li><a href="index.php?getmodule=modEnnemi&action=afficherEnnemis">AfficherEnnemi Vue</a></li>
        </ul>
<?php
    }

    

}