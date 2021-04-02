<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>LOGIN USUÁRIO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  >
    <style>
        body{
            width: 500px;
            font-size: 15pt;
            margin: 150px auto 0px auto;
        }
        td {
            padding: 5px;
        }
    </style>
</head>
<body>
        <?php
            require_once "includes/conexao.php";
            require_once "includes/login.php";
            require_once "includes/functions.php";
        ?>

    <div id="body">
        <tr><img scr="img/logo-gm.jpg" alt="logo-gm">
        <?php 
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;
        
            if(is_null($u) || is_null($s)){
                require "user-login-form.php";
            } else {
                $q = "SELECT usuario, nome, senha, tipo FROM users WHERE usuario = '$u' LIMIT 1";
                $busca = $conexao->query($q);
                if(!$busca){
                    echo msg_erro('FALHA AO ACESSAR BANCO DE DADOS!');
                } else {
                    if($busca->num_rows > 0){
                        $reg = $busca->fetch_object();
                        if($s==$reg->senha){
                            echo msg_sucesso('LOGIN REALIZADO COM SUCESSO');
                            $_SESSION['user'] = $reg->usuario;
                            $_SESSION['nome'] = $reg->nome;
                            $_SESSION['tipo'] = $reg->tipo;
                        }else{
                            echo msg_erro('SENHA INVÁLIDA');
                        }
                    }else{
                        echo msg_erro('USUÁRIO NÃO EXISTE');
                    }                   
                }
            }
            echo back();
        ?>
    </div>
</body>
</html>