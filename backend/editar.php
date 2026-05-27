<?php

require_once 'conexao.php';

$id = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM aniversariantes WHERE id = ?");

$sql->execute([$id]);

$aniversario = $sql->fetch();

?>