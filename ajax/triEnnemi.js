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
            url: 'ajax/traitementTri.php', // URL COMPLETE 
            data: {
                'bientotDispo': bientotDispo,
                'dansLeJeu': dansLeJeu,
                'PVDesc': PVDesc
                //!!!!!!!!!!!!!!!!!!!
            },
            success: function (response) {
                console.log(response);
                $('.listeEnnemis').html(response);
                //FAIRE LES APPEND DANS LES DIV
            },
            error: function (xhr, status, error) {
                console.log('Erreur dans la requête Ajax');
                console.log('Statut de la requête : ' + status);
                console.log('Erreur : ' + error);
            // error: function () {
            //     console.log('Erreur dans la requête Ajax');
            }
        });

    });
});
