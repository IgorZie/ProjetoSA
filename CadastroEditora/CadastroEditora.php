<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro Editora</title>
    
    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="./styleCadEditora.css">

    <script>
        function verificar() {
            let editora = document.getElementById('editora').value;
            if (editora == "") {
                alert('Preencha o campo editora');
                formulario.editora.focus();
                return false;
            } else {
                alert('Editora cadastrada com sucesso');
            }
        }
    </script>
</head>

<body>
    <header>
        <h1 style="margin-left: 650px;">Cadastrar Editora</h1>
        <section style="margin-left: auto; margin-right:15px;">
            <div style="padding: 15px;">
                <a href="../ListarLivros/index.php" target="_blank" style="margin-right: 8px;">Lista Livros</a>
                <a href="../CadastroAutor/CadastroAutor.php" target="_blank" style="margin-right: 8px;">Autor</a>
                <a href="../CadastroLivros/CadastroLivro.php" target="_blank" style="margin-right: 8px;">Livro</a>
                <a href="../CadastroCategoria/CadastroCategoria.php" target="_blank" style="margin-right: 8px;">Categoria</a>
                <a href="../CadastroIdioma/CadastroIdioma.php" target="_blank" style="margin-right: 8px;">Idioma</a>
            </div>
        </section>
    </header>

    <main>
        <form method="POST" action="./CadastrarEditora.php" id="formulario">
            <div class="inputs-container">
                <label>Nome Editora:</label>
                <input type="text" id="editora" name="editora" required>
                <button type="submit" onclick="return verificar()">Cadastrar</button>
            </div>
        </form>
    </main>


</body>

</html>