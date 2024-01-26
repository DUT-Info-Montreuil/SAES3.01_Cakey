<?php

class VueProfil {

	public function __construct() {

	}

	public function afficheProfilModifiable($donnees, $donneesClassement, $classementAllLevel, $amis, $demandeAmis, $demandeRecu){
  
		?>	
 		<div class="profile-container">
			<div class="profile-info">
				<h1> Mon profil </h1> 
			
				<div id="photo">
					<figure>	
						<img src="<?php echo $donnees["pathPhotoProfil"]?>"  alt="photoProfil" id="photoProfil">
					</figure>
				</div>

				<div class="user-info">
					<form action="index.php?getmodule=modProfil&action=modifProfil" method="POST">

						Nom d'utilisateur : <?= htmlentities($donnees["login"], ENT_QUOTES, 'UTF-8')?><br/>
							
						Description : <input type="text" id="description" name="description" placeholder="<?= htmlentities($donnees["description"], ENT_QUOTES, 'UTF-8') ?>"  maxlength="255" style="width: 300px;vertical-align: top;" 	/><br/>

						<div>
							<input type="submit" value ="Enregistrer"/> <br/>
						</div>
					</form>
				</div>
			</div>
				<div id = "boutons-action">
					<div id = "upload">
						<form method="post" enctype="multipart/form-data" action="index.php?getmodule=modProfil&action=changerPhotoProfil" id = "uploadFile">
							<input type="file" name="pathPhotoProfil"/>
							<button type="submit" name="submit" class="boutonSubmit">Valider</button>
						</form>
					</div>
						<button type="button" id="boutonPartagerProfil">Partager mon profil</button> 
						<form action="index.php?getmodule=modProfil&action=ajoutAmi" method="POST" id="DemandeDami">

							<input type="text"  name="login" placeholder="Entrez le nom d'utilisateur"  maxlength="20" id="amiDemande" /> 
							<input type="submit" value ="Ajouter un ami " id="bouton"/> <br/>
						</form>
 				</div>


	
				<!--              JS pour actions bouttons -->
					<script type="text/javascript">
						document.getElementById("boutonPartagerProfil").onclick = function () {
							var currentUrl = window.location.href;

							navigator.clipboard.writeText(currentUrl).then(function() {
								alert('L\'URL a été copiée dans le presse-papiers : ');
							}).catch(function(err) {
								console.error('Erreur lors de la copie dans le presse-papiers : ', err);
							});

					};
						document.getElementById("changerPhotoProfil").onclick = function () {
							location.href = "index.php?getmodule=modProfil&action=changerPhotoProfil";
						};
						 
							
						
					</script>
  
					<br/>
							
 			
 		</div>
		<?php
			echo '<div class="classementEtAmi">';
				echo '<div class="partieClassement">';
					$this->get_classement($donneesClassement, $classementAllLevel);
					echo "</div>";
				echo '<div class="partieAmi">';
					$this->afficherPartieAmis($amis, $demandeAmis, $demandeRecu);
				echo "</div>";
			echo "</div>"; 
	}

	public function afficheProfil($donnees, $donneesClassement, $classementAllLevel, $amis, $demandeAmis, $demandeRecu){
 		?>
		<div class="profile-container">
			<div class="profile-info">
				<div id="photo2">
					<figure>	
						<img src="<?php echo $donnees["pathPhotoProfil"]?>"  alt="photoProfil" id="photoProfil2">
					</figure>
				</div>
				<div class = "userInfo"> 
					<div> <h1><?=$donnees["login"]?></h1></div> 
					<div> <?=$donnees["description"]?></div>
				</div>
			</div>

		<button type="button" id="boutonPartagerProfil">Partager profil</button> 

		<!--              JS pour actions bouttons -->
		<script type="text/javascript">
     		document.getElementById("boutonProfil").onclick = function () {
				var currentUrl = window.location.href;
				navigator.clipboard.writeText(currentUrl).then(function() {
					alert('L\'URL a été copiée dans le presse-papiers');
				}).catch(function(err) {
					console.error('Erreur lors de la copie dans le presse-papiers : ', err);
				});

		};	
		</script>
		<br/>
	</div>
		
		<?php
		   echo '<div class="classementEtAmi">';
		   echo '<div class="partieClassement">';
			   $this->get_classement($donneesClassement, $classementAllLevel);
			   echo "</div>";
		   echo '<div class="partieAmi">';
			   $this->afficherPartieAmisNonModifiable($amis, $demandeAmis, $demandeRecu);
		   echo "</div>";
	   echo "</div>"; 
	}

	public function get_classement($donneesClassement, $classementAllLevel){
		?>
		<div class="colonne-classement">
			<h2> Statistique des 10 niveaux avec les meilleurs scores</h2>
			<table class = "profilClassement">
				<thead>
					<tr>
						<td> niveau</td>
						<td> Dégâts max</td>
						<td> Temps </td>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($donneesClassement as $donnee){
							?>
							<tr>
								<td> <?=$donnee["numeroniveau"]?></td>
								<td> <?=$donnee['score']?></td>
								<td> <?=$donnee['temps']?> </td>
							</tr>
					<?php 
					}
					?>
				</tbody>
			</table>
			 
 			<h2>Statistique de tous les niveaux </h2>
			    <table class = "profilClassement">
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
								?>
								<tr>
									<td> <?=$donnee['numeroniveau']?></td>
									<td> <?=$donnee['scoremax']?></td>
									<td> <?=$donnee['mintemps']?> </td>
								</tr>
						<?php 
						}
						?>
						</tbody>
				</table>
		</div>

			   <?php

	}

 	public function afficherPartieAmis($amis, $demandeAmis, $demandeRecu ){
 
		?>
		<div class="colonne-amis">
			<table class="table-amis">
				<thead>
					<tr>
						<td class="titre-tab-centre"> Mes amis</td> 
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($amis as $ami){
					?>
					
					<tr>
						<td class="table-cell">
    						<a href="index.php?getmodule=modProfil&nom=<?=$ami['login']?>"><?=$ami['login']?></a>
   				 			<form action="index.php?getmodule=modProfil&action=supprimerAmi&user=<?=$ami['login']?>" method="POST">
       							 <input type="submit" value="Supprimer" />
    						</form>
						</td>
  
					</tr>
				</tbody>

					<?php 
						} 
					?>
			</table>	
		</div>
			<table class="table-amis">
				<thead>
						<tr>
							<td class="titre-tab-centre"> Demandes envoyées</td> 
						</tr>
				</thead>
				<tbody>
					<?php
					foreach ($demandeAmis as $dmd){
						?><tr>
							<td> 
								<a href="index.php?getmodule=modProfil&nom=<?=$dmd['login']?>"><?=$dmd['login']?>   </a>
 								<form action="index.php?getmodule=modProfil&action=supprimerDemandeAmi&user=<?=$dmd['login']?>" method="POST">
								<input type="submit" value ="Supprimer" action="index.php?getmodule=modProfil&action=supprimerAmi&user=<?=$dmd['login']?>" /> <br/>
								</form>
							</td>	   
							</tr>
				</tbody>

					<?php } ?>

			</table>

		<table class="table-amis">
		   <thead>
 		  		<tr>
					<td class="titre-tab-centre"> Demandes reçues</td> 
 				</tr>		   </thead>
		   <tbody>
			   <?php
			   foreach ($demandeRecu as $dmdrecu){
   				   ?><tr>
					   <td> <?=$dmdrecu['login']?> 
					  		<form action="index.php?getmodule=modProfil&action=accepterDemandeAmi&user=<?=$dmdrecu['login']?>" method="POST">
								<input type="submit" value ="Accepter" action="index.php?getmodule=modProfil&action=accepterDemandeAmi&user=<?=$ami['login']?>" /> <br/>
							</form> 
							<form action="index.php?getmodule=modProfil&action=supprimerDemandeAmi&user=<?=$dmdrecu['login']?>" method="POST">
								<input type="submit" value ="Supprimer" action="index.php?getmodule=modProfil&action=supprimerAmi&user=<?=$ami['login']?>" /> <br/>
							</form>
							</td>	 
			  		</tr>
					  <?php } ?>
 		</table>
			   </div>

			   <?php 
	
	}
	public function afficherPartieAmisNonModifiable($amis, $demandeAmis, $demandeRecu ){
 
		?>
		<div class="colonne-amis">
			<table class="table-amis">
			<thead>
		 	 	<tr>
					<td class="titre-tab-centre"> Ses amis</td> 
 				</tr>
			</thead>
		   <tbody>
			   <?php
			   foreach ($amis as $ami){
   				   ?><tr>
					   <td> <a href="index.php?getmodule=modProfil&nom=<?=$ami['login']?>"><?=$ami['login']?>   </a>
					
					</td>	   
			  	</tr>
					<?php } ?>
			   </table>
			   </div>
			   <?php 
	
	}
}