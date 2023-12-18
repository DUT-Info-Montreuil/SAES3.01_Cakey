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
		if(isset($_SESSION['newsession'])){
			 echo 'vous êtes déjà connecté avec l\'identifiant " ' . $_SESSION['newsession'] . ' "'; 
			?> </br> <a href="index.php?getmodule=modConnexion&action=deconnexion">Deconnexion</a> <?php
		} else{
?>		<p> Formulaire de connexion </p>
		<form method="post" action="index.php?getmodule=modConnexion&action=connexion">
			<p>Entrez votre login : </p>
			<input type="text" name="login" maxlength="100" />
			<p>Entrez votre mot de passe : </p>
			<input type="text" name="motdepasse" maxlength="200" />

		    <button type="submit" name="submit">submit</button>
		<p> Pas encore inscrit ?</p>
		<a href="index.php?getmodule=modConnexion&action=formulaireInscription">Formulaire d'inscription</a>
		</form>
<?php
		}
	}


    public function formulaireInscription(){
        ?>		
        <p> Formulaire d'inscription </p>
            <form method="post" enctype="multipart/form-data" action="index.php?getmodule=modConnexion&action=inscription">
                <p>Créez votre login : </p>
                <input type="text" name="login" maxlength="100" />
                <p>Créez votre mot de passe : </p>
                <input type="text" name="pwd" maxlength="200" />
                <p>Ajoutez votre photo de profil :</p>
                <input type="file" name="pathPhotoProfil"/>

                <button type="submit" name="submit">submit</button>

            </form>
        <?php
    }
}