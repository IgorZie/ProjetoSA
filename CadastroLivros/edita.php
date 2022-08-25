<?php
require_once '../Database/conexao.php';

$id = $_POST['idLivro'];
$titulo = $_POST['titulo'];
$sinopse = $_POST['sinopse'];
$paginas = $_POST['paginas'];
$anoLivro = $_POST['anoLivro'];
$categoria = $_POST['categoria'];
$idioma = $_POST['idioma'];
$editora = $_POST['editora'];
$autor = $_POST['autor'];


$queryUpdateLivro = " UPDATE livro 
                 SET Titulo_Livro='$titulo',
                 Descricao_Livro='$sinopse',
                 Ano_Publicacao='$anoLivro',
                 Quantidade_Pagina='$paginas',
                 Id_Categoria='$categoria',
                 Id_Editora='$editora',
                 Id_Idioma='$idioma'
                 WHERE Id_Livro=$id";

$queryLivroAutor = " UPDATE livro_autor
                     SET Id_Autor='$autor'
                     WHERE Id_Livro='$id'";

$execLivroAutor = mysqli_query($conexao, $queryLivroAutor);
$execUpdateLivro = mysqli_query($conexao, $queryUpdateLivro);

echo '<script type="text/javascript">';
echo 'alert("Livro ' . $titulo . ' editado com sucesso!");';
echo 'window.location.href = "http://localhost/ProjetoSA/ListarLivros/index.php";';
echo '</script>';