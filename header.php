<?php
    echo "<header>";
    if(empty($_SESSION['user'])){
        echo "<a href='user-login.php'>ENTRAR</a>";
    }else{
        echo "Olá!, <strong>" . $_SESSION['nome'] . "</strong> | ";
        echo "<a href='user-edit.php'>MEUS DADOS</a> | ";
        if(is_admin()){
            echo "<a href='user-new.php'>NOVO USUÁRIO</a> | ";
            echo "NOVA ORDEM";
        }
        echo "<a href='user-logout.php'>SAIR</a>";
    }   
    echo "</header>";