<?php 
require_once('../Database/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro Livros</title>

    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="./styleCadLivro.css">

    <script>
        function verificar() {
            let titulo = document.getElementById('titulo').value;
            let sinopse = document.getElementById('sinopse').value;
            let paginas = document.getElementById('paginas').value;
            let anoLivro = document.getElementById('anoLivro').value;
            let categoria = document.getElementById('categoria').value;
            let idioma = document.getElementById('idioma').value;
            let editora = document.getElementById('editora').value;
            let autor = document.getElementById('autor').value;
            let imagem = document.getElementById('imagem').value;

            if (titulo == "") {
                alert('Preencha o campo titulo');
                formulario.titulo.focus();
                return false;
            } else if (sinopse == "") {
                alert('Preencha o campo descrição');
                formulario.sinopse.focus();
                return false;
            } else if (paginas == "") {
                alert('Preencha o campo páginas');
                formulario.paginas.focus();
                return false;
            } else if (anoLivro == "") {
                alert('Preencha o campo ano');
                formulario.anoLivro.focus();
                return false;
            } else if (categoria == "") {
                alert('Selecione uma categoria');
                formulario.categoria.focus();
                return false;
            } else if (idioma == "") {
                alert('Selecione um idioma');
                formulario.idioma.focus();
                return false;
            } else if (editora == "") {
                alert('Selecione uma editora');
                formulario.editora.focus();
                return false;
            } else if (autor == "") {
                alert('Selecione um(a) autor(a)');
                formulario.autor.focus();
                return false;
            } else if (imagem == "") {
                alert('Selecione uma imagem');
                formulario.imagem.focus();
                return false;
            } else {
                alert('Livro cadastrado com sucesso');
            }

        }
    </script>
</head>

<body>
    <header>
        <h1 style="margin-left: 15px;">Cadastrar Livro</h1>
        <section style="margin-left: auto; margin-right:15px;">
            <div style="padding: 15px;">
                <a href="../ListarLivros/index.php" target="_blank" style="margin-right: 8px;">Lista Livros</a>
                <a href="../CadastroAutor/CadastroAutor.php" target="_blank" style="margin-right: 8px;">Autor</a>
                <a href="../CadastroEditora/CadastroEditora.php" target="_blank" style="margin-right: 8px;">Editora</a>
                <a href="../CadastroCategoria/CadastroCategoria.php" target="_blank" style="margin-right: 8px;">Categoria</a>
                <a href="../CadastroIdioma/CadastroIdioma.php" target="_blank" style="margin-right: 8px;">Idioma</a>
            </div>
        </section>
    </header>

    <main>
        <form enctype="multipart/form-data" method="POST" action="./CadastrarLivro.php" id="formulario">
            <section class="inputs-container">

                <div class="">
                    <label>Título do Livro:</label>
                    <input type="text" id="titulo" name="titulo" min="3" class="" required>
                </div>

                <div>
                    <label>Descrição:</label><br>
                    <textarea name="sinopse" id="sinopse" name="sinopse" cols="30" maxlength="1000" rows="10" style="color: black; padding: 5px" required></textarea>
                </div>

                <div>
                    <label>Páginas:</label><br>
                    <input type="number" id="paginas" name="paginas" required>
                </div>

                <div>
                    <label>Ano do Livro:</label><br>
                    <input type="text" id="anoLivro" name="anoLivro" maxlength="4" minlength="4" required>
                </div>

                <div>
                    <label>Categoria:</label>
                    <select id="categoria" name="categoria" class="selecionar" required>
                        <option></option>
                        <?php
                        $queryCategoria = "SELECT * FROM Categoria ORDER BY Descricao_Categoria";
                        $resultQuery = mysqli_query($conexao, $queryCategoria);
                        while ($rowCategoria = mysqli_fetch_assoc($resultQuery)) {
                            echo '<option value="' . $rowCategoria["Id_Categoria"] . '"> ' . $rowCategoria["Descricao_Categoria"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label>Idioma:</label>
                    <select id="idioma" name="idioma" class="selecionar" required>
                        <option></option>
                        <?php
                        $queryIdioma = "SELECT * FROM Idioma";
                        $resultQuery = mysqli_query($conexao, $queryIdioma);
                        while ($rowIdioma = mysqli_fetch_assoc($resultQuery)) {
                            echo '<option value="' . $rowIdioma["Id_Idioma"] . '"> ' . $rowIdioma["Descricao_Idioma"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label>Editora:</label>
                    <select id="editora" name="editora" class="selecionar" required>
                        <option></option>
                        <?php
                        $queryEditora = "SELECT * FROM Editora ORDER BY Nome_Editora";
                        $resultQuery = mysqli_query($conexao, $queryEditora);
                        while ($rowEditora = mysqli_fetch_assoc($resultQuery)) {
                            echo '<option value="' . $rowEditora["Id_Editora"] . '"> ' . $rowEditora["Nome_Editora"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div>
                    <label>Autor:</label>
                    <select id="autor" name="autor" class="selecionar" required>
                        <option></option>
                        <?php
                        $queryAutor = "SELECT * FROM Autor ORDER BY Nome_Autor";
                        $resultQuery = mysqli_query($conexao, $queryAutor);
                        while ($rowAutor = mysqli_fetch_assoc($resultQuery)) {
                            echo '<option value="' . $rowAutor["Id_Autor"] . '"> ' . $rowAutor["Nome_Autor"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div style="margin-top: 40px;" class="upload">
                    <label>Upload Imagem</label>
                    <input type="file" name="imagem" id="imagem" required>
                </div>

                <div class="">
                    <button type="submit" id="btn-login" onclick="return verificar()">Cadastrar</button>
                </div>

            </section>
        </form>
    </main>


</body>

</html>