$(document).ready(function () {
    $('#bouttonTriEnnemi').click(function (e) {
        e.preventDefault();

        // Récupérez les valeurs des cases à cocher
        var bientotDispo = $('#bientotDispo').prop('checked');
        var dansLeJeu = $('#dansLeJeu').prop('checked');
        var PVDesc = $('#PVDesc').prop('checked');

        // Envoi de la requête Ajax au serveur
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'ajax/traitement_tri.php',
            data: {
                bientotDispo: bientotDispo,
                dansLeJeu: dansLeJeu,
                PVDesc: PVDesc
            },
            success: function (response) {
                $('.listeEnnemis').html(response);
                // Vous pouvez utiliser la variable response ici
                console.log(response); // Affichez la réponse pour le débogage
            },
            error: function () {
                console.log('Erreur dans la requête Ajax');
            }
        });

        // La ligne ci-dessous devrait être supprimée car "data" n'est pas défini ici
        // console.log(data);
    });
});
