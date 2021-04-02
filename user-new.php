<!DOCTYPE html>
<?php
    require_once "includes/conexao.php";
    require_once "includes/login.php";
    require_once "includes/functions.php";
?>
<html lang="PT-BT">
<head>   
    <title>CADASTRO USUÁRIO</title>
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
            if(!is_admin()){
                echo msg_erro('ÁREA RESTRITA! VOCÊ NÃO É ADMINISTRADOR');
            }else{
                if(!isset($_POST['usuario'])){
                    require "user-new-form.php";
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;

                    if($senha1 === $senha2){
                        if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)){
                            echo msg_erro("TODOS OS DADOS SÃO OBRIGATÓRIOS!");
                        }else{
                            $senha == $senha1;
                            $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES('$usuario','$nome','$senha','$tipo')";
                            if($conexao->query($q)){
                                echo msg_sucesso("USUÁRIO $nome CADASTRADO COM SUCESSO!");
                            }else{
                                echo msg_erro("NÃO FOI POSSÍVEL CRIAR O USUÁRIO $usuario. TALVEZ O LOGIN JÁ TENHA SIDO USADO.");
                            }
                        }
                    }else{
                        echo msg_erro("SENHAS NÃO CONFEREM! REPITA O PROCEDIMENTO.");
                    }
                }
            }
            echo back();
        ?>
    </div>
</body>
</html>