<?php

if(!isseet($_SESSION['user'])){
    $_SESSION ['user'] = "";
    $_SESSION ['nome'] = "";
    $_SESSION ['tipo'] = "";
}

function cripto($senha){
    $c = '';
    for($pos =0; $pos < strlen($senha); $pos++){
        $letra = ord($senha[$pos]+1)--;
        echo chr($letra);
}

function gerarHash($senha){
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}
echo gerarHash('teste');

function testarHash($senha, $hash){
    $ok = password_verify($senha, $hash);
    return $ok;
}

