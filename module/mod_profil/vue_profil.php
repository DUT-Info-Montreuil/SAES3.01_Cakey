<?php

class VueProfil {

	public function __construct() {

	}


	public function donneesProfil($donnees){
		//print_r($donnees);
		?>	
		<figure>	
			<img src="<?php echo $donnees["pathPhotoProfil"]?>"  alt="photoProfil" class="photoProfil">
		</figure>

		 <style>
        .photoProfil {
            width: 3cm;
            height:  3cm; 
			border-radius: 50%;
        }
    	</style>

 		<h1> Profil <h1/> 
		<button type="button" id="boutonPartagerProfil">Partager mon profil</button> 
		<button type="button" id="boutonInventaire">Voir mon inventaire</button> 
		<button type="button" id="boutonAjouterAmi">Ajouter un ami</button> 

		<!--              JS pour actions bouttons -->
		<script type="text/javascript">
    		document.getElementById("boutonPartagerProfil").onclick = function () {
   	     		//code pour copier le lien du profil : si id = id de session : page modifiable sinon non 
   	 		};
			document.getElementById("boutonInventaire").onclick = function () {
   	     		location.href = "index.php?getmodule=modProfil&action=inventaire";
   	 		};
			document.getElementById("boutonAjouterAmi").onclick = function () {
   	     		location.href = "index.php?getmodule=modProfil&action=ajoutAmi";
   	 		};
		</script>
  
		<br/>

		<form action="index.php?module=profil&action=modifProfil" method="POST">

 			Nom d'utilisateur : <input type="text" id="login" name="login" placeholder="<?=$donnees["login"]?>"  maxlength="20"  /> <br/>
				 
			Description : <input type="text" id="description" name="description" placeholder="<?=$donnees["description"]?>"  maxlength="255" style="width: 300px; height: 50px;vertical-align: top;" 	/><br/>
 
			<div>
				<input type="submit" value ="Enregistrer"/> <br/>
			</div>
		</form>





		<?php
	}




/*
Array ( 
	[nomUser] => soup [0] => soup [descriptionProfil] => moi cest soup [1] => moi cest soup [pdp] => https://i.pinimg.com/236x/93/d4/2e/93d42e90b085e14f98bbca41c6ba43b4.jpg [2] => https://i.pinimg.com/236x/93/d4/2e/93d42e90b085e14f98bbca41c6ba43b4.jpg ) 
 	public function liste ($tab_equipes) {
		?><ul><?php
		foreach ($tab_equipes as $equipe) {

			?><li><a href="index.php?module=equipes&action=details&id=<?=$equipe["id"]?>"><?=$equipe["nom"]?></a></li><?php
		}
		?></ul><?php
	}
	
	public function details ($donnees) {
		?>
		<h1><?=$donnees["nom"]?></h1>
		<!--Ajouter ici l'affichage de l'année, du pays etc-->
		<?=$donnees["description"]?>
		<?php
	}
*/
 

}
 
