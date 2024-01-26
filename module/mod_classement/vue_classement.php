<?php
class VueClassement{
    public function menuNotPerso(){
        ?> 
            <a href="index.php?getmodule=modClassement&action=general"id="menuClassement">Classement général</a>
            <a href="index.php?getmodule=modClassement&action=niveau"id="menuClassement">Classement par niveau</a>
   
    <?php
    }
    public function menu(){
        ?> <ul>
        <li><a href="index.php?getmodule=modClassement&action=notPerso" id="menuClassement"> Classement</a></li>
        <?php 
        if(isset($_SESSION['newsession'])){
		
            ?><li><a href="index.php?getmodule=modClassement&action=perso"id="menuClassement> Classement Personnel</a></li>
            <?php
            }
            ?>
</ul>
<?php
    }

    public function menuzzef(){
        ?> 
        <nav>
        <a href="index.php?getmodule=modClassement&action=notPerso" id="menuClassement"> Classement</a>
        <?php 
        if(isset($_SESSION['newsession'])){
		
            ?><a href="index.php?getmodule=modClassement&action=perso" id="menuClassement"> Classement Personnel</a>
            <?php
            }
            ?>
            </nav>
            
<?php
    }
    public function menuPerso(){
        ?>
        <nav>
        <a href="index.php?getmodule=modClassement&action=generalPerso" id="menuClassement">Classement général</a>
        <a href="index.php?getmodule=modClassement&action=niveauPerso" id="menuClassement">Classement par niveau</a>
    </nav>
<?php
    }
    public function get_tableauParNiveau($données){
        ?>
         <table>
            <thead>
                <tr>
                    <td > Position</td>
                    <td> Nom</td>
                    <td > Xp </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($données as $util){
                    ?><tr>
                        <td><?=$util["rankScore"]?></td>
                        <td><?=$util["login"]?></a></td>
                        <td> <?=$util["score"]?> </td>
                </tr><?php 
                }
                ?>
                </tbody>
                </table>
                <?php

    }
    public function get_tableauParNiveauTps($données){
        ?>
         <table>
            <thead>
                <tr>
                    <td > Position</td>
                    <td> Nom</td>
                    <td > temps </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($données as $util){
                    ?><tr>
                        <td><?=$util["rankTemps"]?></td>
                        <td><?=$util["login"]?></a></td>
                        <td> <?=$util["temps"]?> </td>
                </tr><?php 
                }
                ?>
                </tbody>
                </table>
                <?php
                

    }
    public function formselNiveau($niveau){
        ?>
         
        <form action="index.php?getmodule=modClassement&action=niveausel" method="POST">
    <fieldset>
    <label for="choixNiveau" id="labelNiveau">Choisir un niveau</label>
        <select name="niveaux" id="niveauSel">
          <?php
                foreach ($niveau as $util){  
                ?><option value=<?=$util["numeroNiveau"]?> ><?=$util["numeroNiveau"]?></option>
               
                <?php
                }
                ?>
        </select>
        <p>
            <input type="submit" name="score" value="score" id="bouton" />
            <input type="submit" name="temps" value="temps" id="bouton" />
        </p>
    </fieldset>
</form>
<?php
    }

    public function formselNiveauPerso($niveau){
        ?>
        <form action="index.php?getmodule=modClassement&action=niveauselPerso" method="POST">
    <fieldset>
    <label for="choixNiveau" id="labelNiveau">Choisir un niveau</label>
        <select name="niveaux" id="niveauSel">
          <?php
                foreach ($niveau as $util){  
                ?><option value=<?=$util["numeroNiveau"]?> ><?=$util["numeroNiveau"]?></option>
               
                <?php
                }
                ?>
        </select>
        <p>
            <input type="submit" name="score" value="score" id="bouton" />
            <input type="submit" name="temps" value="temps" id="bouton"/>
        </p>
    </fieldset>
</form>
<?php
    }
  

	public function tab ($données){
        ?>
         <table>
            <thead>
                <tr>
                    <td > Position</td>
                    <td> Nom</td>
                    <td> niveau max</td>
                    <td > Xp </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($données as $util){
    
                    ?><tr>
                        <td><?=$util["rangG"]?></td>
                        <td><?=$util["login"]?></a></td>
                        <td> <?=$util["niveauMax"]?> </td>
                        <td> <?=$util["Xp"]?> </td>
                </tr><?php 
                }
                ?>
                </tbody>
                </table>
                <?php
                
                
    }
}