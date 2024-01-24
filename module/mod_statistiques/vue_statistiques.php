<?php
 class VueStatistiques extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    
    public function afficherTableauParties($donnees) {
        echo '<table>';
        echo '<thead><tr><th>Numéro de Partie</th><th>Temps</th><th>Score</th><th>Est Gagnée</th><th>Numéro de Niveau</th></tr></thead>';
        echo '<tbody>';
        foreach ($donnees as $partie) {
            echo '<tr>';
            echo '<td>' . $partie['numeroPartie'] . '</td>';
            echo '<td>' . $partie['temps'] . '</td>';
            echo '<td>' . $partie['score'] . '</td>';
            echo '<td>' . ($partie['isGagnee'] ? 'Oui' : 'Non') . '</td>';
            echo '<td>' . $partie['numeroNiveau'] . '</td>';
            echo '</tr>';
            }
        echo '</tbody></table>';
    }    
        

}
?>    