<?php
class VueClassement{
   
    public function menu(){
        ?> 
        <div class="dropdown"> 
            <button>Classement</button>
            <div class="content">
            <a href="index.php?getmodule=modClassement&action=general">Classement général</a>
            <a href="index.php?getmodule=modClassement&action=niveau">Classement par niveau</a>
    </div>
    </div>  
    <?php
    if(isset($_SESSION['newsession'])){
		?> 
        <div class="dropdown"> 
            <button>Classement Personnel</button>
            <div class="content">
            <a href="index.php?getmodule=modClassement&action=generalPerso">Classement général</a>
            <a href="index.php?getmodule=modClassement&action=niveauPerso">Classement par niveau</a>
    </div>
    </div> 

<?php
    }
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
                        <td><a href="index.php?getmodule=modProfil&nom=<?=$util['login']?>"><?=$util['login']?></a></td>
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
                        <td><a href="index.php?getmodule=modProfil&nom=<?=$util['login']?>"><?=$util['login']?></a></td>
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
                        <td><a href="index.php?getmodule=modProfil&nom=<?=$util['login']?>"><?=$util['login']?></a></td>
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