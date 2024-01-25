<?php
class VueCompMenu{

	private $affichage;

	public function __construct(){
		if(isset($_SESSION['newsession'])){
			/*$connect = ' <li><a href="index.php?getmodule=modConnexion&action=deconnexion">Deconnexion</a></li> ';*/
			/*
			$connect = '
			<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modStatistiques&action=pageNiveau">Statistiques</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modProfil">Profil</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modConnexion&action=deconnexion">Deconnexion</a></li> ';
			*/

			$connect = '
			<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modStatistiques&action=pageNiveau">Historique</a></li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="Ressources/gateaux.png" style="width: 70px; height: 70px;" class="logo-img"/>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?getmodule=modProfil">Profil</a>
                        <a class="dropdown-item" href="index.php?getmodule=modConnexion&action=deconnexion">Se Deconnecter</a>
                    </div>
			';
		}
		else { 
			$connect = 
			    '<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modConnexion&action=formulaireInscription">Inscription</a></li> 
			     <li class="nav-item"><a class="nav-link" href="index.php?getmodule=modConnexion&action=formulaireConnexion">Connexion</a></li> ';
		}		                         
		
		/*
		$this->affichage = '
		<nav class="navbar navbar-expand-md navbar-light bg-orange">
			<a class="logo" href="index.php?getmodule=modAccueil&action=page"><img src="Ressources/gateaux.png"/>CAKEY</a>
				<!--<ul class ="menu">-->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!--<div class="collapse navbar-collapse" id="navbarNav"> -->
				<ul class="menu">	
					<li>
						<a href ="index.php?getmodule=modAccueil&action=page">Accueil</a>
					</li>
					<li class="ongletUnivers">
						<a href="#">Univers &ensp;</a>
						<ul class="sousOngletsUnivers">
							<li><a href="index.php?getmodule=modEnnemi&action=bienvenue">Ennemi</a></li>
							<li><a href="#">Ustensiles</a></li>
							<li><a href="#">Niveaux</a></li>
							<li><a href="#">Bonus</a></li>
						</ul>
					</li>


					<li>
						<a href="#">Classement</a>
					</li>
					<li class="barreRecherche">
						<input type="text" maxlength="20" placeholder="Rechercher" class="searchbar input-search" />
						<img src="https://images-na.ssl-images-amazon.com/images/I/41gYkruZM2L.png" alt="search icon" class="button" />
					</li>
					' .	$connect . '
				</ul>
			<!--</div>-->
		</nav>	

	';
	*/

		$this->affichage = '

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
                        <a class="dropdown-item" href="#">Ennemi</a>
                        <a class="dropdown-item" href="#">Ustensiles</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Niveaux</a>
						<a class="dropdown-item" href="#">Bonus</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Classement</a>
                </li>
				' . $connect . '
            </ul>
        </div>
    </nav>
	
		';


	
	/*
	$this->affichage = '
		<nav class="navbar navbar-expand-md navbar-light bg-light">
			<a class="navbar-brand" href="#">Votre Marque</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">À Propos</a>
					</li>
					<!-- Ajoutez d\'autres éléments de menu ici -->
				</ul>
			</div>
		</nav>
	';
	*/	


	}

	public function affiche($lien){
		if(isset($_SESSION['newsession'])){
			/*$connect = ' <li><a href="index.php?getmodule=modConnexion&action=deconnexion">Deconnexion</a></li> ';*/
			/*
			$connect = '
			<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modStatistiques&action=pageNiveau">Statistiques</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modProfil">Profil</a></li>
			<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modConnexion&action=deconnexion">Deconnexion</a></li> ';
			*/

			$connect = '
			<li class="nav-item"><a class="nav-link" href="index.php?getmodule=modStatistiques&action=pageNiveau">Historique</a></li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="'.$lien .'" style="width: 70px; height: 70px;" class="image-rond"/>
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?getmodule=modProfil">Profil</a>
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
								<a class="dropdown-item" href="#">Ennemi</a>
								<a class="dropdown-item" href="#">Ustensiles</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Niveaux</a>
								<a class="dropdown-item" href="#">Bonus</a>
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
