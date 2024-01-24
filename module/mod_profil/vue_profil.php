<?php

class VueProfil {

	public function __construct() {

	}


	public function donneesProfil($donnees, $donneesClassement, $classementAllLevel, $amis, $demandeAmis, $demandeRecu){
		//print_r($donnees);
		?>	
		<figure>	
			<img src="<?php echo $donnees["pathPhotoProfil"]?>"  alt="photoProfil" class="photoProfil">
		</figure>

		<button type="button" id="changerPhotoProfil">Modifier photo </button> 

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
			document.getElementById("changerPhotoProfil").onclick = function () {
   	     		location.href = "index.php?getmodule=modProfil&action=changerPhotoProfil";
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
		   $this->get_classement($donneesClassement, $classementAllLevel);
 		   $this->afficherPartieAmis($amis, $demandeAmis, $demandeRecu);
	}

	public function modifPhotoProfil(){
	?>
		<form  method="POST">

		Entrez le lien de la photo de profil <input type="text" id="linkPDP" name="linkPDP" placeholder="https://image..."     /> <br/>
		
	   <div>
 
		   <input action="index.php?getmodule=modProfil" id ='modif photo' type="submit" value ="Enregistrer"/> <br/>
	   </div>

	   <script type="text/javascript">
    		document.getElementById("modif photo").onclick = function () {
				location.href = "index.php?getmodule=modProfil";

    	 		};
				</script>

   </form>
   <?php



	}

	public function get_classement($donneesClassement, $classementAllLevel){
		?>
		Statistique des 10 niveaux avec les meilleurs scores
		<table>
		   <thead>
			   <tr>
				   <td > niveau</td>
				   <td> Dégâts max</td>
				   <td> Temps </td>
 			   </tr>
		   </thead>
		   <tbody>
			   <?php
			   foreach ($donneesClassement as $donnee){
				// todo  : pq util ne reprends pas les noms de col, pourquoi donnéesclassement boucle la premiere ligne ≠ phpmyamdin
  				   ?><tr>
					   <td> <?=$donnee["numeroniveau"]?></td>
					   <td> <?=$donnee['score']?></td>
					   <td> <?=$donnee['temps']?> </td>
 					   <td>  </td> 
			   </tr>
			   <?php 
			   }
			   ?>
			   </tbody>
			   </table>

			   <h1>Statistique de tous les niveaux </h1>
			   <table>
		   <thead>
			   <tr>
				   <td > niveau</td>
				   <td> Dégâts max</td>
				   <td> Temps min </td>
 			   </tr>
		   </thead>
		   <tbody>
			   <?php
			   foreach ($classementAllLevel as $donnee){
				// todo  : pq util ne reprends pas les noms de col, pourquoi donnéesclassement boucle la premiere ligne ≠ phpmyamdin
  				   ?><tr>
					   <td> <?=$donnee['numeroniveau']?></td>
					   <td> <?=$donnee['scoremax']?></td>
					   <td> <?=$donnee['mintemps']?> </td>
 					   <td>  </td> 
			   </tr>
			   <?php 
			   }
			   ?>
			   </tbody>
			   </table>
			   <?php

	}

 	public function afficherPartieAmis($amis, $demandeAmis, $demandeRecu ){
		//todo : ajouter colonne rang
		?>
		
		<table>
		   <thead>
		   <h1> Mes amis </h1>
		   </thead>
		   <tbody>
			   <?php
			   foreach ($amis as $ami){
   				   ?><tr>
					   <td> <?=$ami['login']?></td>	   
			  		</tr>
					<?php } ?>
		</table>

		<table>
		   <thead>
		   <h1> Demandes envoyées </h1>
		   </thead>
		   <tbody>
			   <?php
			   foreach ($demandeAmis as $dmd){
  				   ?><tr>
					   <td> <?=$dmd['login']?></td>	   
			  		</tr>
					  <?php } ?>

		</table>

		<table>
		   <thead>
		   <h1> Demandes reçues </h1>
		   </thead>
		   <tbody>
			   <?php
			   foreach ($demandeRecu as $dmdrecu){
   				   ?><tr>
					   <td> <?=$dmdrecu['login']?></td>	   
			  		</tr>
					  <?php } ?>

		</table>


			   <?php 
	
	}
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
 

 

 
