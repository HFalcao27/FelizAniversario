<?php

require_once 'conexao.php'; //Isso serve para integrar com o conexão. // O POST QUE É INTEGRADO COM O HTML. //Não precisa ter o backend/conexao.php porque está na mesma página.


if (isset($_POST['nome'])) {

    $nome = $_POST['nome'];
    $data_niver = $_POST['data_niver'];
    $contato = $_POST['contato'];
    $mensagem = $_POST['mensagem'];

    $sql = $pdo->prepare("INSERT INTO aniversariantes (nome, data_niver, contato, mensagem) VALUES (?, ?, ?, ?)");

    $sql->execute([$nome,$data_niver,$contato,$mensagem]);

    /*echo "Aniversário salvo com sucesso!";*/

    header("Location: ../index.php"); //Serve para que depois que o comando for dado de salvar, editar ele volte para a página.
exit;

}

?>