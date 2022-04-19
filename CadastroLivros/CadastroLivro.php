<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro Livros</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="./styleCadLivro.css">
</head>

<body>
    <header>
        <h1 style="margin-left: 650px;">Cadastrar Livro</h1>
        <section style="margin-left: auto; margin-right:15px;">
            <div style="padding: 15px;">
                <a href="../CadastroAutor/CadastroAutor.php" target="_blank" style="margin-right: 8px;">Autor</a>
                <a href="../CadastroEditora/CadastroEditora.php" target="_blank" style="margin-right: 8px;">Editora</a>
                <a href="../CadastroCategoria/CadastroCategoria.php" target="_blank" style="margin-right: 8px;">Categoria</a>
                <a href="../CadastroIdioma/CadastroIdioma.php" target="_blank" style="margin-right: 8px;">Idioma</a>
            </div>
        </section>
    </header>

    <main>
        <form enctype="multipart/form-data" method="POST" action="../testeImagem.php">
            <section class="inputs-container">

                <div class="">
                    <label>Título do Livro:</label>
                    <input type="text" id="nome" name="nome" min="3" class="" style="text-transform: uppercase">
                </div>

                <div>
                    <label>Descrição:</label><br>
                    <textarea name="descriAutor" id="descriAutor" name="descriAutor" cols="30" rows="10" style="color: black; padding: 5px"></textarea>
                </div>

                <div>
                    <label>Páginas:</label><br>
                    <input type="number" id="paginas" name="paginas">
                </div>

                <div>
                    <label>Ano do Livro:</label><br>
                    <input type="text" id="anoLivro" name="anoLivro" maxlength="4" minlength="4">
                </div>

                <div>
                    <label>Categoria:</label>
                    <select id="categoria" name="categoria" class="selecionar">
                        <option></option>
                        <option value="">Terror e Suspense</option>
                        <option value="">Ficção Cientifica</option>
                    </select>
                </div>

                <div>
                    <label>Idioma:</label>
                    <select id="idioma" name="idioma" class="selecionar">
                        <option></option>
                        <option value="">Português</option>
                        <option value="">Inglês</option>
                    </select>
                </div>

                <div>
                    <label>Editora:</label>
                    <select id="editora" name="editora" class="selecionar">
                        <option></option>
                        <option value="">Companhia das Letras</option>
                        <option value=""> Intrínseca</option>
                    </select>
                </div>

                <div>
                    <label>Autor:</label>
                    <select id="autor" name="autor" class="selecionar">
                        <option></option>
                        <option value="">Stephen King</option>
                        <option value="">Isaac Asimov</option>
                    </select>
                </div>

                <div>
                    <label>Upload Imagem</label>
                    <input type="file" name="imagem" id="imagem">
                </div>

                <div class="">
                    <button type="submit" id="btn-login">Cadastrar</button>
                </div>

            </section>
        </form>
    </main>


</body>

</html>

