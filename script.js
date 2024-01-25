$(document).ready(function() {
    $(".table-container").on("swiperight", function() {
        // Gérer le swipe vers la droite (naviguer à la page précédente)
        var niveauActuel = parseInt(getParameterByName('niveau')) || 1;
        if (niveauActuel > 1) {
            window.location.href = 'index.php?niveau=' + (niveauActuel - 1);
        }
    });

    $(".table-container").on("swipeleft", function() {
        // Gérer le swipe vers la gauche (naviguer à la page suivante)
        var niveauActuel = parseInt(getParameterByName('niveau')) || 1;
        window.location.href = 'index.php?niveau=' + (niveauActuel + 1);
    });

    // Fonction pour récupérer la valeur d'un paramètre d'URL
    function getParameterByName(name) {
        var url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        return results[2] || '';
    }
    
});
