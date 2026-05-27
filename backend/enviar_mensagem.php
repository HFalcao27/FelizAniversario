<?php

require_once 'conexao.php';

$dataHoje = date('m-d');

// Busca aniversariantes do dia
$sql = $pdo->prepare("
    SELECT * FROM aniversariantes
    WHERE DATE_FORMAT(data_niver, '%m-%d') = ?
");

$sql->execute([$dataHoje]);

$aniversariantes = $sql->fetchAll();

foreach($aniversariantes as $aniversario){

    $nome = $aniversario['nome'];
    $telefone = preg_replace('/[^0-9]/', '', $aniversario['contato']);
    $mensagem = $aniversario['mensagem'];

    // Mensagem padrão caso esteja vazia
    if(empty($mensagem)){
        $mensagem = "Feliz aniversário, $nome! 🎉";
    }

    // Codifica mensagem para URL
    $mensagemUrl = urlencode($mensagem);

    // Link WhatsApp
    $link = "https://wa.me/55{$telefone}?text={$mensagemUrl}";

    // Abre o link automaticamente
    echo "<script>
        window.open('$link', '_blank');
    </script>";

    echo "Mensagem enviada para $nome <br>";
}