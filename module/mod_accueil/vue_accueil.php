<?php class VueAccueil extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function page(){
    /*
    echo '
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="histoire">
                        <div class="imgText">
                            <img src="Ressources/coeur.png">
                            <p>Nouveautés</p>
                        </div>
                        <h3>L\'univers et l\'histoire de Cakey</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                            Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                            ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="gameplayVideo">
                        <video class="responsive-video" width="100%" height="auto" controls>
                            <source src="Ressources/gameplayGakey.ogx" type="video/ogg">
                        </video>
                    </div>
                </div>
            </div>
        </div>



    ';
    */
    
    echo '
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="histoire" style="width: 100%;">
                <div class="imgText d-flex align-items-center">
                    <img src="Ressources/coeur.png" class="img-fluid" alt="Coeur">
                </div>
                <h3 class="text-center">L\'univers et l\'histoire de Cakey</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                    ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="gameplayVideo">
                <video class="responsive-video" width="100%" height="auto" controls>
                    <source src="Ressources/gameplayGakey.ogx" type="video/ogg">
                </video>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="Telechargement">
                <a class="lienJeu" href="https://drive.google.com/drive/u/0/folders/1B1SwAYAbnX6UHVS0bPmXEE-KaxiweCzj">Télécharger</a>
            </div>
        </div>
    </div>
</div>









    
    ';
}

}