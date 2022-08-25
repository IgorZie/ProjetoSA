<?php
require_once '../Database/conexao.php';

if (isset($_GET['id']) && isset($_GET['action'])) {
    $Id_Livro = $_GET['id'];
    if ($_GET['action'] == "delete") {

        $queryDeletar = "DELETE FROM livro_autor WHERE Id_Livro=$Id_Livro";
        $queryDeletarLivro = "DELETE FROM livro WHERE Id_Livro=$Id_Livro";

        mysqli_query($conexao, $queryDeletar);
        mysqli_query($conexao, $queryDeletarLivro);

        $filename = "../Uploads/$Id_Livro.jpg";

        if (file_exists($filename)) {
            unlink($filename);
        }

        echo '<script type="text/javascript">';
        echo 'alert("Livro deletado com sucesso!");';
        echo 'window.location.href = "http://localhost/ProjetoSA/ListarLivros/index.php";';
        echo '</script>';
        // header("Location: ./index.php");
    }
}


$filtrar = "";
$queryFiltrar = "";
$ordenacao = ' ORDER BY Id_Livro ASC';
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <title>Listagem de Livros</title>
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
            <a href="../ListarLivros/listaAutores.php" target="_blank" style="margin-right: 8px;">Autores</a>
            <a href="../ListarLivros/listaEditoras.php" target="_blank" style="margin-right: 8px;">Editoras</a>
            <a href="../ListarLivros/listaCategorias.php" target="_blank" style="margin-right: 8px;">Categorias</a>
            <a href="../ListarLivros/listaIdiomas.php" target="_blank" style="margin-right: 8px;">Idiomas</a>
        </div>
        <h1 style="margin-left: 250px;">Lista dos Livros</h1>
        <section style="margin-left: auto; margin-right:15px;">
            <div style="padding: 15px;"><span style="color: white;"><strong>Cadastros:</strong></span>
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

            $queryFiltrar = " WHERE (Titulo_Livro LIKE '%$filtrar%' OR Ano_Publicacao LIKE '%$filtrar%' OR Quantidade_Pagina LIKE '%$filtrar%' OR cat.Descricao_Categoria LIKE '%$filtrar%' OR a.Nome_Autor LIKE '%$filtrar%' OR edi.Nome_Editora LIKE '%$filtrar%' OR idi.Descricao_Idioma LIKE '%$filtrar%') GROUP BY li.Titulo_Livro";
        } else if (isset($_POST['btn-limparFiltro'])) {

            $queryFiltrar = "";
        }
    }

    $queryListar = 'SELECT li.Id_Livro, Titulo_Livro, Ano_Publicacao, Quantidade_Pagina,  cat.Descricao_Categoria, a.Nome_Autor ,edi.Nome_Editora, idi.Descricao_Idioma
    FROM livro li
    JOIN categoria cat ON cat.Id_Categoria=li.Id_Categoria
    JOIN livro_autor la ON la.Id_Livro=li.Id_Livro
    JOIN autor a ON a.Id_Autor=la.Id_Autor
    JOIN editora edi ON edi.Id_Editora=li.Id_Editora
    JOIN idioma idi ON idi.Id_Idioma=li.Id_Idioma' . $ordenacao . $queryFiltrar;


    echo '<br>';
    echo '<div class="container-fluid"><form action="./index.php" method="POST" id="form-filtro" name="form-filtro">';
    echo "<input type='text' name='filtro' id='filtro' class='form-control' style='width:300px' value='$filtrar'>"
        . "<div style='margin-top:2px;'>"
        . "<button type='submit' name='btn-filtro' id='btn-filtro' style='cursor: pointer;' class='btn btn-dark'>Pesquisar</button><span>   </span>"
        . "<button type='submit' name='btn-limparFiltro' id='btn-limparFiltro' style='cursor: pointer;' class='btn btn-dark'>Limpar</button>";
    echo '</div></form></div>';

    $resultadoListar = mysqli_query($conexao, $queryListar);
    echo '<div class="container-fluid">';
    echo '<table class="table table-striped table-dark" style="text-align: center">';
    echo '<br> <thead>';
    echo '<tr><th scope="col">Id_Livro</th>'
        . '<th scope="col">Titulo do Livro</th>'
        . '<th scope="col">Ano</th>'
        . '<th scope="col">Páginas</th>'
        . '<th scope="col">Categoria</th>'
        . '<th scope="col">Autor</th>'
        . '<th scope="col">Editora</th>'
        . '<th scope="col">Idioma</th>'
        . '<th scope="col" colspan=2>Ações</th>'
        . '</tr> </thead> <tbody>';
    while ($linha_livro = mysqli_fetch_array($resultadoListar)) {
        echo "<tr><td>$linha_livro[Id_Livro]</td>"
            . "<td>$linha_livro[Titulo_Livro]</td>"
            . "<td>$linha_livro[Ano_Publicacao]</td>"
            . "<td>$linha_livro[Quantidade_Pagina]</td>"
            . "<td>$linha_livro[Descricao_Categoria]</td>"
            . "<td>$linha_livro[Nome_Autor]</td>"
            . "<td>$linha_livro[Nome_Editora]</td>"
            . "<td>$linha_livro[Descricao_Idioma]</td>"
            . "<td><a href='../CadastroLivros/EditarLivros.php?id=" . $linha_livro['Id_Livro'] . "&action=editar' class='btn-excluir' name='btn_delete' id='btn_delete_$linha_livro[Id_Livro]'>Editar</a></td>"
            . "<td><a href='index.php?id=" . $linha_livro['Id_Livro'] . "&action=delete' class='btn-excluir' name='btn_delete' id='btn_delete_$linha_livro[Id_Livro]'>Deletar</a></td>"
            . "</tr>";
    }
    echo '</tbody> </table>';

    ?>

</body>

</html>