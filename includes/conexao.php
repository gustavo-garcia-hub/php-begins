<?php
    $conexao = new mysqli("localhost", "root", "", "main");
    if($conexao -> connect_errno){
        echo "<p> Not found, error $conexao -> errno: $conexao -> connect_error</p>";
        die();
    }