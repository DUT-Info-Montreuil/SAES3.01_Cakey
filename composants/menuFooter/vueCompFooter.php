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
            <li><a href="#"><img src="ressources/footer/facebookIcon.png"></a></li>
            <li><a href="#"><img src="ressources/footer/twitterIcon.png"></a></li>
            <li><a href="#"><img src="ressources/footer/InstagramIcon.png"></a></li>
        </ul>

        <p>&copy 2023-2024 Fiona BORGAZZI, Huseyin CAKAR, Victoire CASSIRAME, Caroline ZHENG</p>
	';
	}

	public function affiche(){
		echo $this->affichage;
	}

}


?>
