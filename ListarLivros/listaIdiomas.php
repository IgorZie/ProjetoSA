<?php
require_once '../Database/conexao.php';

if (isset($_GET['id']) && isset($_GET['action'])) {
    $Id_Idioma = $_GET['id'];
    if ($_GET['action'] == "delete") {

        $queryDeletar = "DELETE FROM idioma WHERE Id_Idioma=$Id_Idioma";

        mysqli_query($conexao, $queryDeletar);

        echo '<script type="text/javascript">';
        echo 'alert("Idioma deletado com sucesso!");';
        echo 'window.location.href = "http://localhost/ProjetoSA/ListarLivros/listaIdiomas.php";';
        echo '</script>';
        // header("Location: ./index.php");
    }
}

$filtrar = "";
$queryFiltrar = "";
$ordenacao = ' ORDER BY Id_Idioma ASC';
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <title>Listagem de Idiomas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./styleLista.css">
</head>

<body>
    <header>
        <div style="padding: 15px;">
        <span style="color: white;"><strong>Listas:</strong></span>
        <a href="../ListarLivros/index.php" target="_blank" style="margin-right: 8px;">Livros</a>
        <a href="../ListarLivros/listaAutores.php" target="_blank" style="margin-right: 8px;">Autores</a>
        <a href="../ListarLivros/listaEditoras.php" target="_blank" style="margin-right: 8px;">Editoras</a>
        <a href="../ListarLivros/listaCategorias.php" target="_blank" style="margin-right: 8px;">Categorias</a>
        </div>
        <h1 style="margin-left: 250px;">Lista de Idiomas</h1>
        <section style="margin-left: auto; margin-right:15px;">
            <div style="padding: 15px;">
            <span style="color: white;"><strong>Cadastros:</strong></span>
                <a href="../CadastroLivros/CadastroLivro.php" target="_blank" style="margin-right: 8px;">Livro</a>
                <a href="../CadastroAutor/CadastroAutor.php" target="_blank" style="margin-right: 8px;">Autor</a>
                <a href="../CadastroEditora/CadastroEditora.php" target="_blank" style="margin-right: 8px;">Editora</a>
                <a href="../CadastroCategoria/CadastroCategoria.php" target="_blank" style="margin-right: 8px;">Categoria</a>
                <a href="../CadastroIdioma/CadastroIdioma.php" target="_blank" style="margin-right: 8px;">Idioma</a>
            </div>
        </section>
    </header>
    <?php

    if (isset($_POST['filtro'])) {

        if (isset($_POST['btn-filtro'])) {
            $ordenacao = "";

            $filtrar = $_POST['filtro'];

            $queryFiltrar = " WHERE (Descricao_Idioma LIKE '%$filtrar%') GROUP BY Descricao_Idioma";
        } else if (isset($_POST['btn-limparFiltro'])) {

            $queryFiltrar = "";
        }
    }


    $queryListar = 'SELECT * FROM idioma' . $ordenacao . $queryFiltrar;


    echo '<br>';
    echo '<div class="container-fluid"><form action="./listaIdiomas.php" method="POST" id="form-filtro" name="form-filtro">';
    echo "<input type='text' name='filtro' id='filtro' class='form-control' style='width:300px' value='$filtrar'>"
        . "<div style='margin-top:2px;'>"
        . "<button type='submit' name='btn-filtro' id='btn-filtro' style='cursor: pointer;' class='btn btn-dark'>Pesquisar</button><span>   </span>"
        . "<button type='submit' name='btn-limparFiltro' id='btn-limparFiltro' style='cursor: pointer;' class='btn btn-dark'>Limpar</button>";
    echo '</div></form></div>';

    $resultadoListar = mysqli_query($conexao, $queryListar);
    echo '<div class="container-fluid">';
    echo '<table class="table table-striped table-dark">';
    echo '<br> <thead>';
    echo '<tr><th scope="col">Id Idioma</th>'
        . '<th scope="col">Descrição Idioma</th>'
        . '<th scope="col">Ações</th>'
        . '</tr> </thead> <tbody>';
    while ($linha_Idioma = mysqli_fetch_array($resultadoListar)) {
        echo "<tr><td>$linha_Idioma[Id_Idioma]</td>"
            . "<td>$linha_Idioma[Descricao_Idioma]</td>"
            . "<td><a href='listaIdiomas.php?id=" . $linha_Idioma['Id_Idioma'] . "&action=delete' class='btn-excluir' name='btn_delete' id='btn_delete_$linha_Idioma[Id_Idioma]'>Deletar</a></td>"
            . "</tr>";
    }
    echo '</tbody> </table>';

    ?>

</body>