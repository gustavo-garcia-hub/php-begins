<!DOCTYPE html>
<?php
    require_once "includes/conexao.php";
    require_once "includes/login.php";
    require_once "includes/functions.php";
?>
<html lang="PT-BR">
<head>
    <title>EDIÇÃO DADOS USUÁRIO</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  >
</head>
<body>
    <div id="body">
        <?php
            if(!is_logado()){
                echo msg_erro("EFETUE <a href='user-login.php'>LOGIN</a> PARA AUTORIZAÇÃO DE EDIÇÃO.");
            }else{
                if(!isset($_POST['usuario'])){
                    include "user-edit-form.php";
                }else{
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;

                    $q = "UPDATE usuarios SET usuario = '$usuario', nome = '$nome'";

                    if(empty($senha1) || is_null($senha1)){
                        echo msg_aviso("SENHA NÃO FOI ALTERADA.");
                    }else{
                        if($senha1 === $senha2){
                            $senha = gerarHash($senha1);
                            $q .= ", senha='$senha1'";
                        }else{
                            echo msg_erro("SENHAS NÃO CONFEREM. A SENHA ANTERIOR SERÁ MANTIDA.");
                        }
                    }

                    $q .= "WHERE usuario = ' " . $_SESSION['user']. " ' ";

                    if($conexao->query($q)){
                        echo msg_sucesso("USUÁRIO ALTERADO COM SUCESSO!");
                        logout();
                        echo msg_aviso("POR SEGURANÇA, EFETUE O <a href='user-login.php'>LOGIN</a> NOVAMENTE.");
                    }else{
                        echo msg_erro("NÃO FOI POSSÍVEL ALTERAR OS DADOS.");
                    }
                }
            }
        ?>
        <?php echo back(); ?>
    </div>
    <?php require_once "footer.php"; ?>
</body>
</html>