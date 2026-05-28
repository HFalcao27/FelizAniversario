<?php

require_once 'backend/conexao.php';

$sql = $pdo->prepare("SELECT * FROM usuarios");

$sql->execute();

$usuarios = $sql->fetchAll();

print_r($usuarios);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <title>Cadastro</title>
        <link rel="stylesheet" href="./style/reset.css"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">    
        <link rel="stylesheet" href="./styles/login.css">
    </head>
    <body class="login_todo">
        <h2 class="login_todo_paragr">Cadastro de Usuario</h2>

            <form action="backend/salvarUsuario.php" method="POST">
        <div class="mb-3_cadastro">
            <label for="exampleInputEmail1" class="form-label">Nome:</label>
            <input name="nome" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
        </div>
        <div class="mb-3_cadastro">
            <label for="exampleInputEmail1" class="form-label">email: </label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
        </div>
        <div class="mb-3_cadastro">
            <label for="exampleInputEmail1" class="form-label">Telefone: </label>
            <input name="numero_telefone" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">  
        </div>

        <div class="mb-3_cadastro">
            <label for="exampleInputPassword1" class="form-label">Senha: </label>
            <input name="senha" type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <div class="mb-3_cadastro">
            <label for="exampleInputPassword1" class="form-label">Repita a Senha: </label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <a href="index.php">
            <button class="login_button" type="button">Volta ao Login</button>
        </a>

         <!--Coloca o que aqui. Eu acho que tem que cadastrar e voltar para o login.-->
            <button class="login_button" type="submit">Cadastrar</button>        
        </form>
        
    </body>
</html>