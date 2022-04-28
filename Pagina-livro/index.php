<?php
require_once('../Database/conexao.php');
// include('../TelaLogin/verifica_login.php');
// $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- fonts text -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Livro</title>
</head>

<body>
    <div class="container-fluid2">

        <header>
            <!-- seção que aponta para outras paginas/areas -->
            <nav>
                <!-- âncora, com href cria ligação com endereços -->
                <a class="logo" href="../HomePage/index.php">sorvil</a>
                <!-- search button -->
                <form class="search_form" action="../HomePage/index.php" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="Pesquisar..." name="search">
                    <!-- i = parte do texto que é destacada -->
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <!-- lista desordenada,  -->
                <ul class="nav-list">
                    <!-- elementos -->
                    <li><a href="../EstantePage/index.php">Estante</a></li>
                    <li><a href="../TelaEditar/TelaEditar.php">Perfil</a></li>
                    <?php
                    if (empty($_SESSION['email'])) {
                        echo "<li><a href='../TelaLogin/TelaLogin.php'>Entrar</a></li>";
                    } else {
                        echo "<li><a href='../TelaLogin/logout.php'>Sair</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </header>

        <aside>
            <div class="aside-container">
                <img class="img-livro" src="../Uploads/<?= $_GET['idLivro'] ?>.jpg" alt="Capa Livro" height="300" width="200" style="overflow: hidden;">
            </div>

            <form class="estante-form" action="processa.php" method="POST" enctype="multipart/form-data">
                <select class="select" name="select">
                    <option value="" selected disabled hidden>Adicionar a estante</option>
                    <?php
                    $queryStatus = "SELECT * FROM status_livro ORDER BY Descricao_Status";
                    $resultQueryStatus = mysqli_query($conexao, $queryStatus);
                    while ($rowStatus = mysqli_fetch_assoc($resultQueryStatus)) {
                        echo "<option value='" . $rowStatus['Id_Status_Livro'] . "'> " . $rowStatus['Descricao_Status'] . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" class="btn btn-secondary btn-lg" value="+">
            </form>
        </aside>

        <main>
            <div class="main-top">
                <section class="titulo">
                    <?php
                    if (isset($_GET['idLivro'])) {

                        $idLivro = $_GET['idLivro'];
                        $queryBuscaLivro = "SELECT * FROM livro li
                            JOIN livro_autor la ON la.Id_Livro=li.Id_Livro
                            JOIN autor au ON au.Id_Autor=la.Id_Autor
                            JOIN editora ed ON ed.Id_Editora=li.Id_Editora
                            JOIN categoria ca ON ca.Id_Categoria=li.Id_Categoria
                            JOIN idioma id ON id.Id_Idioma=li.Id_Idioma
                            WHERE li.Id_Livro='$idLivro'";
                        $resultQueryLivro = mysqli_query($conexao, $queryBuscaLivro);
                        $livro = mysqli_fetch_array($resultQueryLivro);
                        echo "<h1>" . $livro['Titulo_Livro'] . "</h1>";
                    }
                    ?>

                </section>
                <div class="descricao">
                    <p><?= $livro['Descricao_Livro'] ?></p>
                </div>

                <div class="info">
                    <?php

                    echo "<p style=''>"
                        . $livro['Descricao_Idioma'] . " <span class='text-muted'> | </span> " . $livro['Quantidade_Pagina'] . " Páginas"
                        . "<span class='text-muted'> | </span>" . "Editora: " . $livro['Nome_Editora'] . "<span class='text-muted'> | </span>" . "Ano de publicação: " . $livro['Ano_Publicacao']
                        . "<span class='text-muted'> | </span>" . "Autor(a): <strong>" . $livro['Nome_Autor'] . "</strong>"
                        . "</p>";

                    ?>
                </div>
            </div>

            <div class="main-botton"  style="margin-top: 150px;">
                <form class="comente" action="processa.php" method="POST" enctype="multipart/form-data">
                    <h4>Avaliação</h4>
                    <div class="estrelas">
                        <input type="radio" id="cm_star-empty" name="fb" value="" checked />
                        <label for="cm_star-1"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-1" name="fb" value="1" />
                        <label for="cm_star-2"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-2" name="fb" value="2" />
                        <label for="cm_star-3"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-3" name="fb" value="3" />
                        <label for="cm_star-4"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-4" name="fb" value="4" />
                        <label for="cm_star-5"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-5" name="fb" value="5" />
                    </div>

                    <textarea cols=60 id="comente" rows="3" name="comente" maxlength="500" wrap="hard" placeholder="comente aqui"></textarea>
                    <br>
                    <input type="submit" class="btn btn-secondary btn-lg" value="Enviar avaliação">
                </form><br>

                <div class="comentario">
                    <br><h4>Outras avaliações</h4><br>
                    <?php
                    
                    $queryBuscaAvaliacao = "SELECT * FROM usuario_livro ul
                    JOIN livro li ON li.Id_Livro=ul.Id_Livro
                    JOIN usuario us ON us.Id_Usuario=ul.Id_Usuario
                    WHERE ul.Id_Livro='$idLivro'";

                    $resultQueryAvalicao = mysqli_query($conexao, $queryBuscaAvaliacao);
                    $arrayAvaliacao = mysqli_fetch_assoc($resultQueryAvalicao);
                    $rowAvaliacao = mysqli_num_rows($resultQueryAvalicao);

                    if ($rowAvaliacao > 0){
                        echo '<div class="coment">'
                        . '<hr class="dashed">'
                        . "<p>" . $arrayAvaliacao['Nome_Usuario'] . "<br>" . $arrayAvaliacao['Comentario_Avaliacao'] . "</p>"
                        . '</div>';
                    } else{
                        echo "<p><h4><strong>Não existe outras avaliações para este livro</strong></h4></p>";
                    }                    

                    ?>

                </div>
            </div>

        </main>


        <footer>
            <ul class="foot-list">
                <li>Sugira livros em: sorvil.joinville@gmail.com</li>
                <li>© Copyright 2022 Sorvil</li>
            </ul>
        </footer>

    </div>
</body>