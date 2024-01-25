<?php
class VueCompMenu{

	private $affichage;

	public function __construct(){
	
	}
	
	public function affiche($lien){
		if(isset($_SESSION['newsession'])){
				$connect = '
				<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modStatistiques&action=pageNiveau">Historique</a></li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="'.$lien .'" style="width: 70px; height: 70px;" class="image-rond"/>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?getmodule=modProfils">Profil</a>
							<a class="dropdown-item" href="index.php?getmodule=modConnexion&action=deconnexion">Se Deconnecter</a>
						</div>
				';
		}
		else { 
			$connect = 
				'<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modConnexion&action=formulaireConnexion">Connexion</a></li>
				<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modConnexion&action=formulaireInscription">Inscription</a></li>';
		}

		$affichage = '
			<nav class="navbar navbar-expand-md navbar-light bg-orange">
				<a class="navbar-brand"  href="index.php?getmodule=modAccueil&action=page"><img src="Ressources/gateaux.png" style="width: 70px; height: 70px;" class="logo-img"/>CAKEY</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="index.php?getmodule=modAccueil&action=page">Accueil <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Univers
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="index.php?getmodule=modEnnemi&action=bienvenue">Ennemi</a>
								<a class="dropdown-item" href="index.php?getmodule=modUstensile&action=bienvenue">Ustensiles</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.php?getmodule=modNiveau&action=bienvenue">Niveaux</a>
								<a class="dropdown-item" href="index.php?getmodule=modBonus&action=bienvenue">Bonus</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php?getmodule=modClassement">Classement</a>
						</li>
						' . $connect . '
					</ul>
				</div>
			</nav>
			
		';




		echo $affichage;
	}

}


?>
