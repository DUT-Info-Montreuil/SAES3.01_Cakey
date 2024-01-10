<?php
class VueCompMenu{

	private $affichage;

	//A REMPLACER AVEC LE VRAI MENU
	public function __construct(){
		$this->affichage = ' <ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="index.php?getmodule=modEnnemi">Ennemis</a></li>
					<li><a href="index.php?getmodule=modUstensile">Tours</a></li>
					<li><a href="index.php?getmodule=modBonus">Bonus</a></li>
					<li><a href="index.php?getmodule=modConnexion">Connexion</a></li>
				</ul>';
	}

	public function affiche(){
		echo $this->affichage;
	}

}


?>
