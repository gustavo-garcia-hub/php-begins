<!DOCTYPE html>
<?php
    require_once "includes/conexao.php";
    require_once "includes/login.php";
    require_once "includes/functions.php";
?>
<html lang="PT_BR">
<head>
    <title>GUARDA MIRIM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
</head>
<body>
    <div id="body">
        <?php
            logout();
            echo msg_sucesso('USUÁRIO DESCONECTADO COM SUCESSO');
            echo back();
        ?>
    </div>
</body>
</html>