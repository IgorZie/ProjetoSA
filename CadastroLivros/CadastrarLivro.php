<?php

require_once '../Database/conexao.php';

$titulo = $_POST['titulo'];
$sinopse = str_replace("'", "", $_POST['sinopse']);
$paginas = $_POST['paginas'];
$anoLivro = $_POST['anoLivro'];
$categoria = $_POST['categoria'];
$idioma = $_POST['idioma'];
$editora = $_POST['editora'];
$autor = $_POST['autor'];

$queryCadastrar = "INSERT INTO livro (Titulo_livro, Descricao_Livro, Ano_Publicacao, Quantidade_Pagina, Id_Categoria, Id_Editora, Id_Idioma) VALUES ('$titulo', '$sinopse', '$anoLivro', '$paginas', '$categoria', '$editora', '$idioma')";

$execquery = mysqli_query($conexao, $queryCadastrar);

$lastId = mysqli_insert_id($conexao);

require_once "../vendor/autoload.php";

use Intervention\Image\ImageManagerStatic as Image;

Image::configure(['driver' => 'gd']);

$image = Image::make($_FILES['imagem']['tmp_name'])->resize(348, 500);

$image->save("../Uploads/$lastId.jpg", 60);

$queryPopular = "INSERT INTO livro_autor (Id_Livro, Id_Autor) VALUE ('$lastId', '$autor')";

$execQueryPopular = mysqli_query($conexao, $queryPopular);

header('Location: ./CadastroLivro.php');