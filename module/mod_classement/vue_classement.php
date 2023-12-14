<?php
class VueClassement{
    public function menu(){
        ?> <ul>
            <li><a href="index.php?module=classement&action=general">Classement général</a></li>
            <li><a href="index.php?module=classement&action=niveau">Classement par niveau</a></li>
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


}
