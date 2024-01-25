<?php
class VueClassement{
    public function menuNotPerso(){
        ?> <ul>
            <li><a href="index.php?getmodule=modClassement&action=general">Classement général</a></li>
            <li><a href="index.php?getmodule=modClassement&action=niveau">Classement par niveau</a></li>
    </ul>
    <?php
    }
    public function menu(){
        ?> <ul>
        <li><a href="index.php?getmodule=modClassement&action=notPerso"> Classement</a></li>
        <?php 
        if(isset($_SESSION['newsession'])){
		
            ?><li><a href="index.php?getmodule=modClassement&action=perso"> Classement Personnel</a></li>
            <?php
            }
            ?>
</ul>
<?php
    }
    public function menuPerso(){
        ?> <ul>
        <li><a href="index.php?getmodule=modClassement&action=generalPerso">Classement général</a></li>
        <li><a href="index.php?getmodule=modClassement&action=niveauPerso">Classement par niveau</a></li>
</ul>
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
                        <td><a href="index.php?getmodule=modClassement&action=niveau&id=<?=$util["idUtil"]?>"><?=$util["login"]?></a></td>
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
                        <td><a href="index.php?getmodule=modClassement&action=niveau&id=<?=$util["idUtil"]?>"><?=$util["login"]?></a></td>
                        <td> <?=$util["temps"]?> </td>
                </tr><?php 
                }
                ?>
                </tbody>
                </table>
                <?php
                

    }
    public function formNiveau(){
            ?>
            <form action="index.php?getmodule=modClassement&action=niveau1" method="POST">
                 <button type="submit" > score</button>
            </form>
            <form action="index.php?getmodule=modClassement&action=niveau2" method="POST">
                 <button type="submit" > temps</button>
            </form>
            <?php
                }
    
    public function selectionnerNiveau($niveau){
        ?>
        <label for="choixNiveau">Choisir un niveau</label>
        <select name="niveaux" onchange="updated(this)">
          <?php
                foreach ($niveau as $util){  
                ?><option value=<?=$util["numeroNiveau"]?> ><?=$util["numeroNiveau"]?></option>
               
                <?php
                }
                ?>
        </select>
        <?php
    }

    public function formselNiveau($niveau){
        ?>
        <form action="index.php?getmodule=modClassement&action=niveausel" method="POST">
    <fieldset>
    <label for="choixNiveau">Choisir un niveau</label>
        <select name="niveaux" id="niveauSel">
          <?php
                foreach ($niveau as $util){  
                ?><option value=<?=$util["numeroNiveau"]?> ><?=$util["numeroNiveau"]?></option>
               
                <?php
                }
                ?>
        </select>
        <p>
            <input type="submit" name="score" value="score" />
            <input type="submit" name="temps" value="temps" />
        </p>
    </fieldset>
</form>
<?php
    }

    public function formselNiveauPerso($niveau){
        ?>
        <form action="index.php?getmodule=modClassement&action=niveauselPerso" method="POST">
    <fieldset>
    <label for="choixNiveau">Choisir un niveau</label>
        <select name="niveaux" id="niveauSel">
          <?php
                foreach ($niveau as $util){  
                ?><option value=<?=$util["numeroNiveau"]?> ><?=$util["numeroNiveau"]?></option>
               
                <?php
                }
                ?>
        </select>
        <p>
            <input type="submit" name="score" value="score" />
            <input type="submit" name="temps" value="temps" />
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
                        <td><a href="index.php?getmodule=modClassement&action=niveau&id=<?=$util["idUtil"]?>"><?=$util["login"]?></a></td>
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
