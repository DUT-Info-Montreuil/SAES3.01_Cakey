<?php
class VueCompFooter{

	private $affichage;

	public function __construct(){
		$this->affichage = '
        <ul class="footer">
            <li><a href = "#">Autres jeux de Cakey Group</a></li>
            <li><a href = "#">Team</a></li>
            <li><a href = "#">Terms</a></li>
            <li><a href = "#">Privacy</a></li>
            <li><a href = "#">Cookies</a></li>
        </ul>
        <ul class="icon">
            <li><a href="#"><img src="Ressources/facebookIcon.png"></a></li>
            <li><a href="#"><img src="Ressources/twitterIcon.png"></a></li>
            <li><a href="#"><img src="Ressources/InstagramIcon.png"></a></li>
        </ul>
	';
	}

	public function affiche(){
		echo $this->affichage;
	}

}


?>
