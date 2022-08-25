<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro Idioma</title>

    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="./styleCadIdioma.css">

    <script>
        function verificar() {
            let idioma = document.getElementById('idioma').value;
            if (idioma == "") {
                alert('Preencha o campo idioma');
                formulario.idioma.focus();
                return false;
            } else {
                alert('Idioma cadastrado com sucesso');
            }
        }
    </script>

</head>

<body>
    <header>
        <h1 style="margin-left: 650px;">Cadastrar Idioma</h1>
        <section style="margin-left: auto; margin-right:15px;">
            <div style="padding: 15px;">
                <a href="../ListarLivros/index.php" target="_blank" style="margin-right: 8px;">Lista Livros</a>
                <a href="../CadastroAutor/CadastroAutor.php" target="_blank" style="margin-right: 8px;">Autor</a>
                <a href="../CadastroEditora/CadastroEditora.php" target="_blank" style="margin-right: 8px;">Editora</a>
                <a href="../CadastroCategoria/CadastroCategoria.php" target="_blank" style="margin-right: 8px;">Categoria</a>
                <a href="../CadastroLivros/CadastroLivro.php" target="_blank" style="margin-right: 8px;">Livro</a>
            </div>
        </section>
    </header>

    <main>
        <form method="POST" action="./CadastrarIdioma.php" id="formulario">
            <div class="inputs-container">
                <label>Descrição:</label>
                <input type="text" id="idioma" name="idioma" required>
                <button type="submit" onclick="return verificar()">Cadastrar</button>
            </div>
        </form>
    </main>


</body>

</html>