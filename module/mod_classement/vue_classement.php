<?php
class VueClassement{
    public function menu(){
        ?> <ul>
            <li><a href="index.php?getmodule=modClassement&action=general">Classement général</a></li>
            <li><a href="index.php?getmodule=modClassement&action=niveau">Classement par niveau</a></li>
    </ul>
    <?php
    }
    public function get_tableauGeneral(){
        ?>
        <h2> Classement général</h2>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae efficitur tortor, ac gravida lectus. Nullam lobortis quam ipsum, eu tincidunt sapien condimentum eleifend. Aenean cursus vitae urna condimentum pellentesque. Nullam feugiat porttitor orci, eleifend facilisis sapien commodo ut. Vestibulum vulputate dolor ac facilisis iaculis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sollicitudin faucibus elit quis cursus. Aenean eu finibus nisi. 
    </p>
    <?php
    }
    public function get_tableauParNiveau($données){
        ?>
         <table>
            <thead>
                <tr>
                    <td > Position</td>
                    <td> Nom</td>
                    <td> rang </td>
                    <td > Xp </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($données as $util){
                    ?><tr>
                        <td><?=$util["Rank() OVER(ORDER BY score DESC )"]?></td>
                        <td><a href="index.php?getmodule=modClassement&action=niveau&id=<?=$util["idUtil"]?>"><?=$util["login"]?></a></td>
                        <td> <?=$util["login"]?> </td>
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
                    <td> rang </td>
                    <td > temps </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($données as $util){
                    ?><tr>
                        <td><?=$util["Rank() OVER(ORDER BY temps ASC )"]?></td>
                        <td><a href="index.php?getmodule=modClassement&action=niveau&id=<?=$util["idUtil"]?>"><?=$util["login"]?></a></td>
                        <td> <?=$util["login"]?> </td>
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

    public function formselNiveau(){
        ?>
        <form action="/traiter-message.php" method="post">
    <fieldset>
        <p>
            <label>Votre message :</label>
            <textarea name="message"></textarea>
        <p>
        <p>
            <input type="submit" name="previsualiser" value="Previsualiser" />
            <input type="submit" name="envoyer" value="Envoyer" />
        </p>
    </fieldset>
</form>
    }

  

	public function tab ($données){
        ?>
         <table>
            <thead>
                <tr>
                    <td > Position</td>
                    <td> Nom</td>
                    <td> rang </td>
                    <td> niveau max</td>
                    <td > Xp </td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($données as $util){
    
                    ?><tr>
                        <td><?=$util["Rank() OVER(ORDER BY Sum(score) DESC )"]?></td>
                        <td><a href="index.php?getmodule=modClassement&action=niveau&id=<?=$util["idUtil"]?>"><?=$util["login"]?></a></td>
                        <td> <?=$util["login"]?> </td>
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
