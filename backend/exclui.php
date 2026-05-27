<?php

require_once 'conexao.php';
if (isset($_GET['id'])) { //E se trocar o get pelo POST

    $id = $_GET['id'];  //e se trocar o get pelo POST

    $sql = $pdo->prepare("DELETE FROM aniversariantes WHERE id = ?");

    $sql->execute([$id]);

}

header("Location: ../aniversariossalvos.php"); //vai exclui e a página vai recarregar vai voltar para essa ai
exit;

?>