<?php

require_once 'backend/conexao.php'; // backend porque é outra pasta.

$sql = $pdo->prepare("SELECT * FROM aniversariantes");

$sql->execute();

$aniversarios = $sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <title>Home</title>
        <link rel="stylesheet" href="./style/reset.css"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">    
        <link rel="stylesheet" href="./styles/style.css">
    </head>

    <body class="container">

        <header class="cabecario">
            <a href="index.php"><p class="cabecario_paragraph">Calendário</p></a> 
            <a href="aniversariossalvos.php"><p class="cabecario_paragraph">Aniversários Salvos</p></a>

        </header>

    <h1 class="paragraph">Feliz Aniversário</h1>
    <section>
            <div class="container__calendario">
            <div class="container__meseano">
                <button onclick="prevMonth()">❮</button>
                <h2 id="meseano"></h2>
                <button onclick="nextMonth()">❯</button>
            </div>
            <div class="container__diasdasemana">
                <div>Dom</div><div>Seg</div><div>Ter</div>
                <div>Qua</div><div>Qui</div><div>Sex</div><div>Sáb</div>
            </div>

            <div class="days" id="days"></div>
            </div>

    </section>
        <form action="backend/salvar.php" method="POST"> <!--Esse action está servindo para salvar no backend-->
            <div id="modal" class="modal">
            <div class="modal__oculto"
            style="background-color: rgb(34, 39, 113);
                    display: flex;
                    flex-direction: column;
                    padding: 10px 30px 30px 30px;
                    border-radius: 30px;
                    width: 400px 300px;
                    gap: 10px;">
                <h3>Aniversário de Quem?</h3>
                <input type="text" name="nome" id="titulo" placeholder="Quem e quando está aniversariando?">
                <input type="date" name="data_niver" id="data">
                <input type="tel" name="contato" id="telefone" placeholder="Telefone (Ex: 11999999999)">
                <input type="text" name="mensagem" id="mensagem" placeholder="Mensagem de aniversário (opcional)">

                <button type="submit">Salvar</button> <!--onclick="salvarEvento()"-->
                <button onclick="fecharModal()">Cancelar</button>
            </div>
            </div>

            <script src="./js/script.js"></script>

        </form>

    </body>

</html>