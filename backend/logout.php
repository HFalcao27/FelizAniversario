<?php


session_start(); //Limpa as variaveis da sessão
session_destroy(); //destroi a sessão

header("Location: ../index.php");
exit;

?>