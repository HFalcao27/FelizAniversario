<?php

session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if($usuario == "admin" && $senha == "123"){

    $_SESSION['login'] = true;

    header("Location: index.php");

}else{

    echo "Login inválido";

}