<?php

require_once 'conexao.php'; 

if (isset($_POST['nome'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $numero_telefone = $_POST['numero_telefone'];
    $senha = $_POST['senha'];

    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email, numero_telefone, senha) VALUES (?, ?, ?, ?)");

    $sql->execute([$nome,$email,$numero_telefone,$senha]);

    header("Location: ../index.php");
exit;

}

?>