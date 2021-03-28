<?php

if(empty($_SESSION['user'])){
    echo "<a href='user-login.php'><input type='submit' value='ENTRAR'></a>";
}else{
    echo "Olá, " .$_SESSION['nome'];
}
echo "</p>";