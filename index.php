<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <title>GUARDA MIRIM</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
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
                            echo "<td>R$ $reg->valor";
                            echo "<td>$myFormat";
                            echo "<td>adm";
                        }   
                    }
                }
            ?>
        </table>
    </div>
    <?php include_once "footer.php"; ?>
</body>
</html>