<?php

session_start();
require_once 'backend/conexao.php';


?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <title>login</title>
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
        <h2 style="
        display: flex;
        color: white;
        font-family: 'Poppins', sans-serif;
        padding:120px;
        ">Login</h2>

            <form method="POST" action="backend/autenticar.php">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email ou Telefone:</label>
            <input name="login" type="text" class="form-control" placeholder="Email ou Telefone"  id="exampleInputEmail1" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha:</label>
            <input name="senha" type="password" class="form-control" placeholder="Senha" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Manter Conectado</label>
        </div>
        <button class="login_button" type="submit">Entrar</button>
        
            <a href="cadastrar.php">
        <button style="
        cursor: pointer;
        padding: 5px 5px;
        " type="button">Cadastrar</button>
        </a>
        </form>
        
    </body>
</html>