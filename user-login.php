<!DOCTYPE html>
<html lang="pt-br">
<?php
        require_once "includes\conexao.php";
        require_once "includes\functions.php";
        require_once "includes\login.php"
?>
<head>
    <meta charset="UTF-8">
    <title>???</title>
    <link rel="stylesheet" href="assets\styles.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
        <div id="body">
            <?php
                $u = $_POST['usuario'] ?? null;
                $s = $_POST['senha'] ?? null;
                
                if(is_null($u) || is_null($s)){
                    require "user-login-form.php";
                }else{
                    echo"dados passados";
                }
            ?>
        </div>
        <?php $conexao->close();?>
        </body>
</html>