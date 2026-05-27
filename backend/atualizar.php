<?php

require_once 'conexao.php';

$id = $_POST['id'];

$nome = $_POST['nome'];
$data_niver = $_POST['data_niver'];
$contato = $_POST['contato'];
$mensagem = $_POST['mensagem'];

$sql = $pdo->prepare("
    UPDATE aniversariantes
    SET
        nome = ?,
        data_niver = ?,
        contato = ?,
        mensagem = ?
    WHERE id = ?
");

$sql->execute([
    $nome,
    $data_niver,
    $contato,
    $mensagem,
    $id
]);

header("Location: ../aniversariossalvos.php"); //Mudar?
exit;

?>