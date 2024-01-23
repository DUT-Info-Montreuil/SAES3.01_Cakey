<?php class VueConnexion extends VueGenerique{

    public function __contruct(){
        parent::__construct();
    }


    public function menuConnexion(){
		if(isset($_SESSION['newsession'])){
?>
		<ul>
			<li><a href="index.php?getmodule=modConnexion&action=formulaireInscription">Formulaire d'inscription</a></li>
			<li><a href="index.php?getmodule=modConnexion&action=formulaireConnexion">Formulaire connexion</a></li>
<?php 
		}
		else { 
?>
			<li><a href="index.php?getmodule=modConnexion&action=deconnexion">Deconnexion</a></li> 
<?php 
		} 
?>
			
		</ul>
<?php
	}

    public function formulaireConnexion(){
		self::header();
		if(isset($_SESSION['newsession'])){
			 echo 'Vous êtes déjà connecté en tant que "'. $_SESSION['newsession'] . '"'; 
			?> </br> 
			<p>Ce n'est pas vous ?</p> 
			<a href="index.php?getmodule=modConnexion&action=deconnexion">Deconnexion</a> <?php
		} else{
			
?>		<p> Formulaire de connexion </p>
		<form method="post" action="index.php?getmodule=modConnexion&action=connexion">
			<p>Entrez votre login : </p>
			<input type="text" name="login" maxlength="100" required />
			<p>Entrez votre mot de passe : </p>
			<input type="password" name="pwd" maxlength="200" required/>

		    <button type="submit" name="seConnecter">Valider</button>
		<p> Pas encore inscrit ?</p>
		<a href="index.php?getmodule=modConnexion&action=formulaireInscription">Formulaire d'inscription</a>
		</form>
<?php
		}
		self::footer();
	}


    public function formulaireInscription(){
		self::header();
        ?>		
        <p> Formulaire d'inscription </p>
            <form method="post" enctype="multipart/form-data" action="index.php?getmodule=modConnexion&action=inscription">
                <p>Créez votre login : </p>
                <input type="text" name="login" maxlength="100" required />
                <p>Créez votre mot de passe : </p>
                <input type="text" name="pwd" maxlength="200" required/>
                <p>Ajoutez votre photo de profil :</p>
                <input type="file" name="pathPhotoProfil"/>

                <button type="submit" name="submit">Valider</button>

            </form>
        <?php
		self::footer();
    }
}