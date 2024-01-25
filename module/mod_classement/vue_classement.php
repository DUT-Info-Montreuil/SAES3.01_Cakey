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
    public function get_tableauParNiveau(){
        ?>
        <h2> Classement par niveau</h2>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae efficitur tortor, ac gravida lectus. Nullam lobortis quam ipsum, eu tincidunt sapien condimentum eleifend. Aenean cursus vitae urna condimentum pellentesque. Nullam feugiat porttitor orci, eleifend facilisis sapien commodo ut. Vestibulum vulputate dolor ac facilisis iaculis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent sollicitudin faucibus elit quis cursus. Aenean eu finibus nisi. 
    </p>
    <?php
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
                        <td>1</td>
                        <td><a href="index.php?getModule=modClassement&action=niveau&id=<?=$util["idUtil"]?>"><?=$util["login"]?></a></td>
                        <td> <?=$util["description"]?> </td>
                        <td> <?=$util["nbSignalementsAbusifs"]?> </td>
                        <td> <?=$util["argentChocolat"]?> </td>
                </tr><?php 
                }
                ?>
                </tbody>
                </table>
                <?php
                

                
    }
}
