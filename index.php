<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>ORÇAMENTOS</title>
    <link rel="stylesheet" href="assets\styles.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    <?php
        require_once "includes\conexao.php";
        require_once "header.php";
    ?>
    <div id="body">
        <h2>ORÇAMENTOS</h2>
        <table class="list">
            <?php
                $q = "SELECT p.cod, p.descricao, s.ordem, p.valor, p.dia FROM price p JOIN services s on p.services  = s.cod";
                $busca = $conexao->query($q);
                if(!$busca){
                    echo "<tr><td>BUSCA NÃO RETORNOU RESULTADOS";
                }else{
                    if($busca->num_rows ==0){
                        echo "<tr><td>SEM REGISTROS";
                    }else{
                        while($reg=$busca->fetch_object()){
                            $time = strtotime($reg->dia);
                            $myFormat = date("d-m-Y G:i", $time);
                            echo "<tr><td>$reg->descricao";
                            echo "<td>$reg->ordem";
                            echo "<td>$reg->valor";
                            echo "<td>$myFormat";
                            echo "<td>adm";
                        }   
                    }
                }
            ?>
        </table>
    </div>
    <?php $conexao->close();?>
</body>
</html>