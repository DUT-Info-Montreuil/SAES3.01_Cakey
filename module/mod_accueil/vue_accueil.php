<?php class VueAccueil extends VueGenerique{

public function __contruct(){
    parent::__construct();
}

public function page(){
    echo ' 
    <html>
        <head>
            <title>Page</title>
            <meta charset="utf-8">
          
        </head>
        <body>
            <div class ="histoire">
                <div class="imgText">
                    <img src ="Ressources/coeur.png">
                    <p>Nouveautés</p>
                </div>
                <h3>L\'univers et l\'histoire de Cakey</h3>
                </br>
                </br>
                </br>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus 
                mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
            </div>
            <div class="gameplayVideo">
                <video width="640" height="480" controls>
                    <source src="Ressources/gameplayGakey.ogx" type="video/ogg"> 
                </video>
            </div>
            <!--IL FAUT ENLEVER LES </BR> ET REGLER LE PROBLEME DE LA VIDEO MAL ALLIGNER-->
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
        </body>
    </html>';    
}

}