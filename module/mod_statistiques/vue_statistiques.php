<?php
 class VueStatistiques extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }

    
    public function afficherTableauParties($donnees) {
        echo '<div class="table-responsive">';
        echo '<table class="table">';
        echo '<thead><tr><th>Numéro de Niveau</th><th>Temps</th><th>Score</th><th>Est Gagnée</th></tr></thead>';
        echo '<tbody>';
        foreach ($donnees as $partie) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($partie['numeroNiveau']) . '</td>';
            echo '<td>' . htmlspecialchars($partie['temps']) . '</td>';
            echo '<td>' . htmlspecialchars($partie['score']) . '</td>';
            echo '<td>' . (htmlspecialchars($partie['isGagnee']) ? 'Oui' : 'Non') . '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
        echo '</div>';
    }
    
    
        

}
?>    