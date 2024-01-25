<?php

class VueProfil {

	public function __construct() {

	}

	public function afficheProfilModifiable($donnees, $donneesClassement, $classementAllLevel, $amis, $demandeAmis, $demandeRecu){
		var_dump($donnees);
		var_dump($donnees["login"]);
		?>	
		<figure>	
			<img src="<?php echo $donnees["pathPhotoProfil"]?>"  alt="photoProfil" class="photoProfil">
		</figure>

		<button onclick = "index.php?getmodule=modProfil&action=changerPhotoProfil" type="button" id="changerPhotoProfil" > Modifier photo </button> 

		 <style>
        .photoProfil {
            width: 3cm;
            height:  3cm; 
			border-radius: 50%;
        }
    	</style>

 		<h1> Profil <h1/> 
		<button type="button" id="boutonPartagerProfil">Partager mon profil</button> 
 
	<form action="index.php?getmodule=modProfil&action=ajoutAmi" method="POST">

		<input type="text" id="amiDemande" name="login" placeholder="Entrez le nom d'utilisateur"  maxlength="20"  /> 
		<input type="submit" value ="Ajouter un ami "/> <br/>
	</form>
		<!--              JS pour actions bouttons -->
		<script type="text/javascript">
     		document.getElementById("boutonPartagerProfil").onclick = function () {
				var currentUrl = window.location.href;

				navigator.clipboard.writeText(currentUrl).then(function() {
					alert('L\'URL a été copiée dans le presse-papiers : ' + currentUrl);
				}).catch(function(err) {
					console.error('Erreur lors de la copie dans le presse-papiers : ', err);
				});

		};
			document.getElementById("changerPhotoProfil").onclick = function () {
   	     		location.href = "index.php?getmodule=modProfil&action=changerPhotoProfil";
   	 		};
			document.getElementById("boutonAjouterAmi").onclick = function () {
   	     		location.href = "index.php?getmodule=modProfil&action=ajoutAmi";
   	 		};
				 
			
		</script>
  
		<br/>

		<form action="index.php?getmodule=modProfil&action=modifProfil" method="POST">

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
 
	public function afficheProfil($donnees, $donneesClassement, $classementAllLevel, $amis, $demandeAmis, $demandeRecu){
		var_dump($donnees);
		var_dump($donnees["login"]);
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

 		<div> <h1><?=$donnees["login"]?><h1/></div> 
		 <div> <?=$donnees["description"]?></div>

		<button type="button" id="boutonPartagerProfil">Partager profil</button> 

		<!--              JS pour actions bouttons -->
		<script type="text/javascript">
     		document.getElementById("boutonPartagerProfil").onclick = function () {
				var currentUrl = window.location.href;
				navigator.clipboard.writeText(currentUrl).then(function() {
					alert('L\'URL a été copiée dans le presse-papiers : ' + currentUrl);
				}).catch(function(err) {
					console.error('Erreur lors de la copie dans le presse-papiers : ', err);
				});

		};	
		</script>
  
		<br/>
		 

		<?php
		   $this->get_classement($donneesClassement, $classementAllLevel);
 		   $this->afficherPartieAmisNonModifiable($amis, $demandeAmis, $demandeRecu);
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
		<h1> Statistique des 10 niveaux avec les meilleurs scores</h1>
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
		//<input type="text" id="amiSupp" name="loginSupp" placeholder="Entrez le nom d'utilisateur"  maxlength="20"  /> 

		?>
		
		<table>
		   <thead>
		   <h1> Mes Amis </h1>
		   </thead>
		   <tbody>
			   <?php
			   foreach ($amis as $ami){
   				   ?><tr>
					   <td> <a href="index.php?getmodule=modProfil&action=afficheProfile&nom=<?=$ami['login']?>"><?=$ami['login']?>   </a>
							<form action="index.php?getmodule=modProfil&action=afficheProfil&nom=<?=$ami['login']?>" method="POST">
								<input type="submit" value ="Supprimer" action="index.php?getmodule=modProfil&action=supprimerAmi&nom=<?=$ami['login']?>" /> <br/>
							</form>
					</td>	   
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
					   <td> 
						 <a href="index.php?getmodule=modProfil&action=afficheProfile&nom=<?=$dmd['login']?>"><?=$dmd['login']?>   </a>

 					   		<form action="index.php?getmodule=modProfil&action=supprimerDemandeAmi&nom=<?=$dmd['login']?>" method="POST">
								<input type="submit" value ="Supprimer" action="index.php?getmodule=modProfil&action=supprimerAmi&nom=<?=$dmd['login']?>" /> <br/>
							</form>
			 		  	</td>	   
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
					   <td> <?=$dmdrecu['login']?> 
					  		<form action="index.php?getmodule=modProfil&action=accepterDemandeAmi&nom=<?=$dmdrecu['login']?>" method="POST">
								<input type="submit" value ="Accepter" action="index.php?getmodule=modProfil&action=accepterDemandeAmi&nom=<?=$ami['login']?>" /> <br/>
							</form> 
							<form action="index.php?getmodule=modProfil&action=supprimerDemandeAmi&nom=<?=$dmdrecu['login']?>" method="POST">
								<input type="submit" value ="Supprimer" action="index.php?getmodule=modProfil&action=supprimerAmi&nom=<?=$ami['login']?>" /> <br/>
							</form>
							</td>	 
			  		</tr>
					  <?php } ?>

		</table>


			   <?php 
	
	}
	public function afficherPartieAmisNonModifiable($amis, $demandeAmis, $demandeRecu ){
		//todo : ajouter colonne rang
		//<input type="text" id="amiSupp" name="loginSupp" placeholder="Entrez le nom d'utilisateur"  maxlength="20"  /> 

		?>
		
		<table>
		   <thead>
		   <h1> Ses Amis </h1>
		   </thead>
		   <tbody>
			   <?php
			   foreach ($amis as $ami){
   				   ?><tr>
					   <td> <a href="index.php?getmodule=modProfil&action=afficheProfile&nom=<?=$ami['login']?>"><?=$ami['login']?>   </a>
					
					</td>	   
			  		</tr>
					<?php } ?>
			   </table>
			   <?php 
	
	}
}