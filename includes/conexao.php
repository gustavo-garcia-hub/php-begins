<?php
    $conexao = new mysqli("localhost", "root", "", "main");
    
    if($conexao -> connect_errno){
        echo "<p> Not found, error $conexao -> errno: $conexao -> connect_error</p>";
        die();
    }

$conexao->query("SET NAMES 'UTF8'");
$conexao->query("SET character_set_connection=UTF8");
$conexao->query("SET character_set_client=UTF8");
$conexao->query("SET character_set_results=UTF8");