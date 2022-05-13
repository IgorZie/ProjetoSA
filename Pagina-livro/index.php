<?php
session_start();

$email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";
require_once('../Database/conexao.php');


$livro = $_GET['idLivro'];

function getStatus($status, $statusBanco)
{
    return ($status == $statusBanco) ? 'selected' : '';
}

$status = "";
$nota = "";
$check = "checked";
$check1 = "";
$check2 = "";
$check3 = "";
$check4 = "";
$check5 = "";
$comentario = "";

if (isset($_SESSION['email'])) {


    $queryBuscarUsuario = "SELECT * FROM usuario WHERE Email='$email'";
    $resultQueryBusca = mysqli_query($conexao, $queryBuscarUsuario);
    $arrayUsuario = mysqli_fetch_assoc($resultQueryBusca);
    $usuario = $arrayUsuario['Id_Usuario'];

    $queryUsuarioLivro = "SELECT * FROM usuario_livro WHERE (Id_Usuario='$usuario') AND (Id_Livro='$livro')";
    $execUsuarioLivro = mysqli_query($conexao, $queryUsuarioLivro);

    while ($arrayLivro = mysqli_fetch_assoc($execUsuarioLivro)) {
        $status = $arrayLivro['Id_Status_Livro'];
        $nota = $arrayLivro['Nota_Avaliacao'];
        $comentario = $arrayLivro['Comentario_Avaliacao'];

        $check = "";
        $check1 = "";
        $check2 = "";
        $check3 = "";
        $check4 = "";
        $check5 = "";

        if ($nota == 1) {
            $check1 = 'checked';
        } else if ($nota == 2) {
            $check2 = 'checked';
        } else if ($nota == 3) {
            $check3 = 'checked';
        } else if ($nota == 4) {
            $check4 = 'checked';
        } else if ($nota == 5) {
            $check5 = 'checked';
        } else {
            $check = 'checked';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Icon/icon.ico" />
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

            <form class="estante-form" action="./adicionar.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idLivro" value="<?= $_GET['idLivro'] ?>">
                <select class="select" name="selectStatus" required>
                    <option value="" selected disabled>Adicionar a estante</option>
                    <?php
                    $queryStatus = "SELECT * FROM status_livro ORDER BY Descricao_Status";
                    $resultQueryStatus = mysqli_query($conexao, $queryStatus);
                    while ($rowStatus = mysqli_fetch_assoc($resultQueryStatus)) {
                        // echo "<option value='" . $rowStatus['Id_Status_Livro'] . " '> " . $rowStatus['Descricao_Status'] . "</option>";
                        echo '<option value="' . $rowStatus["Id_Status_Livro"] . '" ' . getStatus($rowStatus["Id_Status_Livro"], $status) . '> ' . $rowStatus["Descricao_Status"] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" class="btn btn-secondary btn-lg" value="+">
            </form>
            <?php

            $queryMedia = "SELECT SUM(Nota_Avaliacao) AS Soma_Notas, COUNT(Nota_Avaliacao) AS Total_Notas
                           FROM usuario_livro
                           WHERE Id_Livro='$livro'";
            $execMedia = mysqli_query($conexao, $queryMedia);
            $arrayMedia = mysqli_fetch_assoc($execMedia);

            if ($arrayMedia['Soma_Notas'] && $arrayMedia['Total_Notas']) {
                $media = number_format(($arrayMedia['Soma_Notas'] / $arrayMedia['Total_Notas']), 1);
            } else {
                $media = "-";
            }

            ?>
            <br>
            <h3 style="width: 50px; margin-top:45px; margin-left: 53px">
                <strong><?= $media ?>/5.0</strong>
            </h3>

        </aside>



        <main class="mb-4">
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

            <div class="main-botton" style="margin-top: 115px;">
                <form class="comente" action="./avaliacao.php" method="POST" enctype="multipart/form-data">
                    <h4>Avaliação</h4>
                    <input type="hidden" name="idLivro" value="<?= $_GET['idLivro'] ?>">
                    <div class="estrelas">
                        <input type="radio" id="cm_star-empty" name="estrela" value="" <?= $check ?> />
                        <label for="cm_star-1"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-1" name="estrela" value="1" <?= $check1 ?> />
                        <label for="cm_star-2"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-2" name="estrela" value="2" <?= $check2 ?> />
                        <label for="cm_star-3"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-3" name="estrela" value="3" <?= $check3 ?> />
                        <label for="cm_star-4"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-4" name="estrela" value="4" <?= $check4 ?> />
                        <label for="cm_star-5"><i class="fa"></i></label>

                        <input type="radio" id="cm_star-5" name="estrela" value="5" <?= $check5 ?> />
                    </div>

                    <textarea cols=60 id="comente" rows="3" name="comente" maxlength="500" wrap="hard" placeholder="Comente aqui..." style="padding: 8px;"></textarea>
                    <br>
                    <input type="submit" class="btn btn-secondary btn-lg" value="Enviar avaliação">
                </form><br>

                <div class="comentario">
                    <br>
                    <h4>Outras avaliações</h4><br>
                    <?php

                    $queryBuscaAvaliacao = "SELECT us.Apelido_Usuario, Comentario_Avaliacao, Data_Inicio FROM usuario_livro ul
                    JOIN livro li ON li.Id_Livro=ul.Id_Livro
                    JOIN usuario us ON us.Id_Usuario=ul.Id_Usuario
                    WHERE ul.Id_Livro='$idLivro'";

                    $resultQueryAvalicao = mysqli_query($conexao, $queryBuscaAvaliacao);
                    $rowAvaliacao = mysqli_num_rows($resultQueryAvalicao);

                    $cont = 0;
                    echo "<div class='row'><div class='col-12'>";
                    while ($arrayAvaliacao = mysqli_fetch_assoc($resultQueryAvalicao)) {
                        if ($arrayAvaliacao['Comentario_Avaliacao']) {
                            $cont++;
                            echo '<div class="coment">'
                                . '<hr class="dashed">'
                                . "<p><strong>" . $arrayAvaliacao['Apelido_Usuario'] . "</strong><br>" . $arrayAvaliacao['Comentario_Avaliacao'] . "<br>"
                                . "<span class='text-muted small'>" . date('d/m/Y', strtotime($arrayAvaliacao['Data_Inicio'])) . "</span>"
                                . "</p>"
                                . '</div>';
                        }
                    }
                    echo "</div></div>";

                    if ($cont == 0) {
                        echo "<p><h4><strong>Não existe outras avaliações para este livro</strong></h4></p>";
                    }

                    ?>
                    <footer>
                        <ul class="foot-list">
                            <li>Sugira livros em: sorvil.joinville@gmail.com</a></li>
                            <li>© Copyright 2022 Sorvil</li>
                        </ul>
                    </footer>
                </div>
            </div>



        </main>




    </div>
</body>