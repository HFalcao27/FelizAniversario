<?php


$pdo = new PDO('mysql:host=localhost;dbname=aniversario','root','');

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
 
        <title>Aniversarios Salvos</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">    
        <link rel="stylesheet" href="./styles/style.css">
</head>

<body class="bodycontainer">

<header class="cabecario">
    <a href="calendario.php">
        <p class="cabecario_paragraph">Calendário</p>
    </a>
    <a href="aniversariossalvos.php">
        <p class="cabecario_paragraph">Aniversários Salvos</p>
    </a>

    <a href="backend/logout.php">
    <img src="./assets/logout_icon_151219.png" alt="Imagem de logout"
    style="
    filter: invert(100%);
    max-width: 30px;
    width:100%;
    height: auto;
    ">
    </a>
</header>

<h1 class="paragraph">🎂 Aniversários Salvos</h1>

 <section class="lista-aniversarios">

        <?php if(count($aniversarios) > 0){ ?>

            <?php foreach($aniversarios as $aniversario){ ?>

                <div class="card-aniversario">
                    <h2 style="
                    font-family: 'Josefin Sans', sans-serif;
                    font-size: 25px;
                    ">
                        <?php echo $aniversario['nome']; ?>
                    </h2>
                    <p style="
                    font-family: 'Poppins', sans-serif;
                    font-size: 15px;
                    ">
                        <strong>Data:</strong>
                        <?php echo date('d/m/Y', strtotime($aniversario['data_niver'])); ?>
                    </p>
                    <p style="
                    font-family: 'Poppins', sans-serif;
                    font-size: 15px;
                    ">
                        <strong>Contato:</strong>
                        <?php echo $aniversario['contato']; ?>
                    </p>
                    <p style="
                    font-family: 'Poppins', sans-serif;
                    font-size: 15px;
                    ">
                        <strong>Mensagem:</strong>
                        <?php echo $aniversario['mensagem']; ?>
                    </p>

                </div>
                    <button 
                    style="
                    color:white;
                    position: absolute;
                    background-color: #1a1a2e;
                    z-index: 1;
                    padding: 5px 10px;
                    border-radius: 5px;
                    font-size: 18px;
                    "
                    onclick='abrirModalEdit(
                        <?= $aniversario["id"]; ?>,
                        <?= json_encode($aniversario["nome"]); ?>,
                        <?= json_encode($aniversario["data_niver"]); ?>,
                        <?= json_encode($aniversario["contato"]); ?>,
                        <?= json_encode($aniversario["mensagem"]); ?>
                    )'> Editar </button>

                    <button 
                    style="
                    color:red;
                    position: absolute;
                    background-color: black;
                    z-index: 1;
                    padding: 5px 10px;
                    border-radius: 5px;
                    margin: 0px 0px 0px 90px;
                    font-size: 18px;
                    "
                    onclick='excluiModal(
                        <?= $aniversario["id"]; ?>,
                        <?= json_encode($aniversario["nome"]); ?>
                    )'>Excluir</button>

                    <hr style="
                    margin: 40px 0px;"></hr>
                    <br></br>              
                
            <?php } ?>

        <?php } else { ?>

            <p class="sem-aniversarios">
                Nenhum aniversário salvo ainda.
            </p>

        <?php } ?>

    </section>

            <!--Editar o Modal -->   
            <!--Vai ter que fazer o Css por aqui com style. De alguma forma o modal não está conectando com o arquivo separado do css.-->
    <div id="modalEdit"     
            style="    display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Josefin Sans', sans-serif;
            background-color: rgba(19, 87, 129, 0.5);">


        <div style="background-color: rgb(34, 39, 113);
                    display: flex;
                    flex-direction: column;
                    padding: 10px 30px 30px 30px;
                    border-radius: 30px;
                    width: 400px 300px;
                    gap: 10px;">

            <span style="font-size: 30px;
                        cursor: pointer;
                        align-self: flex-end;
                        color:white;" 
                
                
                onclick="fecharModalEdit()">
                &times;
            </span>

            <h2 style="color: white">Editar Aniversário</h2>

            <form action="backend/atualizar.php" method="POST"> <!--Ficar atento nisso.  PARA QUAL DIRETORIO ESTÁ  ENVIANDO NO BACKEND -->

                <input type="hidden" name="id" id="editId">
            <div>
                <label style="color:white;
                            padding: 0px 30px 0px 0px;
                            display:flex;
                            ">Nome:
                </label>
                <input type="text" name="nome" id="editNome">
            </div>
            <div>
                <label style="color:white;
                            padding: 0px 30px 0px 0px;
                            display:flex;
                            " >Data:
                </label>
                <input type="date" name="data_niver" id="editData">
            </div>
            <div>
                <label style="color:white;
                            padding: 0px 30px 0px 0px;
                            display:flex;
                            ">Contato:
                </label>
                <input type="text" name="contato" id="editContato">
            </div>
            <div>
                <label style="color:white;
                            padding: 0px 30px 0px 0px;
                            display:flex;
                            ">Mensagem:
                </label>
                <textarea name="mensagem" id="editMensagem"></textarea>

            </div>

            <button type="submit">
                    Salvar Alterações
            </button>
            </form>

        </div>

    </div>

<script src="./js/aniversariossalvos.js"></script>

</body>


</html>