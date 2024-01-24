<?php
class VueCompMenu{

	private $affichage;

	public function __construct(){
		$this->affichage = '
		<ul class ="menu">
			<li class="logo" href="accueil.html">
				<a href="index.php?getmodule=modAccueil&action=page"><img src="Ressources/gateaux.png"/>CAKEY</a>
			</li>
			<li>
				<a href ="index.php?getmodule=modAccueil&action=page">Accueil</a>
			</li>
			<li class="ongletUnivers"><a href="#">Univers &ensp;</a>
				<ul class="sousOngletsUnivers">
					<li><a href = "index.php?getmodule=modEnnemi&action=bienvenue">Ennemi</a></li>
					<li><a href = "#">Ustensiles</a></li>
					<li><a href = "#">Niveaux</a></li>
					<li><a href = "#">Bonus</a></li>
				</ul>
			</li>
			<li>
				<a href="index.php?getmodule=modClassement">Classement</a>
			</li>
			<li class="barreRecherche">
				<input type="text" maxlength="20" placeholder="Rechercher" class="searchbar" />
				<img src="https://images-na.ssl-images-amazon.com/images/I/41gYkruZM2L.png" alt="search icon" class="button" />
			</li> ';
				if(isset($_SESSION['newsession'])){
					echo '   <li><a href="index.php?getmodule=modConnexion&action=deconnexion">Deconnexion</a></li> ';
				}
				else { 
					echo '    <li><a href="index.php?getmodule=modConnexion&action=formulaireInscription">Inscription</a></li> ';
					echo '    <li><a href="index.php?getmodule=modConnexion&action=formulaireConnexion">Connexion</a></li> ';                            }
				echo ' 
			</li>
		</ul>
	';
	}

	public function affiche(){
		echo $this->affichage;
	}

}


?>