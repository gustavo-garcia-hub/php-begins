<?php

if(empty($_SESSION['user'])){
    echo "<a href='user-login.php'><h5>ENTRAR</h5></a>"; 
}else{
    echo "Olá, " .$_SESSION['nome'];
}
