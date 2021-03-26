<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>ORÇAMENTOS</title>
    <link rel="stylesheet" href="assets\styles.css"/>
</head>
<body>
    <?php
        require_once "includes\conexao.php";
    ?>
        <div id="body">
            <h2>ORÇAMENTOS</h2>
            <table class="list">
            <?php
                $busca = $conexao->query("SELECT *FROM price");
                if(!$busca){
                    echo "<tr><td>BUSCA NÃO RETORNOU RESULTADOS";
                }else{
                    if($busca->num_rows ==0){
                        echo "<tr><td>SEM REGISTROS";
                    }else{
                        while($reg=$busca->fetch_object()){
                            $time = strtotime($reg->dia);
                            $myFormat = date("d-m-Y G:i", $time);
                            echo "<tr><td>$myFormat<td>$reg->descricao<td>$reg->services<td>$reg->valor";
                        echo "<td>ADM";
                        }   
                    }
                }
            ?>
        </div>
        <?php $conexao->close();?>
</body>
</html>