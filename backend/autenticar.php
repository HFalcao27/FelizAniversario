<?php

session_start();
require_once 'conexao.php';

$login = $_POST['login'] ?? '';
$senha = $_POST['senha'] ?? '';

$sql = $pdo->prepare("SELECT *FROM usuarios WHERE (email = :login OR numero_telefone = :login) AND senha = :senha");

$sql->execute([
    ':login' => $login,
    ':senha' => $senha]);

if ($sql->rowCount() > 0) {

    $dados = $sql->fetch();

    $_SESSION['login'] = $dados['id'];
    $_SESSION['nome'] = $dados['nome'];

    header("Location: ../calendario.php");
    exit;

} else {

    echo "Email/telefone ou senha incorretos";

}
?>