<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro Autor</title>

    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="./styleCadAutor.css">

    <script>
        function verificar(){
            let nomeAutor = document.getElementById('nomeAutor').value;
            let descriAutor = document.getElementById('descriAutor').value;
            if (nomeAutor == ""){
                alert('Preencha o campo nome');
                formulario.nomeAutor.focus();
                return false;
            } else if (descriAutor == ""){
                alert('Preencha o campo descrição');
                formulario.descriAutor.focus();
                return false;
            } else {
                alert ('Autor cadastrado com sucesso');
            }
        }
    </script>

</head>

<body>
<header>
        <h1 style="margin-left: 650px;">Cadastrar Autor</h1>
        <section style="margin-left: auto; margin-right:15px;">
            <div style="padding: 15px;">
                <a href="../ListarLivros/index.php" target="_blank" style="margin-right: 8px;">Lista Livros</a>                
                <a href="../CadastroEditora/CadastroEditora.php" target="_blank" style="margin-right: 8px;">Editora</a>
                <a href="../CadastroLivros/CadastroLivro.php" target="_blank" style="margin-right: 8px;">Livro</a>
                <a href="../CadastroCategoria/CadastroCategoria.php" target="_blank" style="margin-right: 8px;">Categoria</a>
                <a href="../CadastroIdioma/CadastroIdioma.php" target="_blank" style="margin-right: 8px;">Idioma</a>
            </div>
        </section>
    </header>

    <main>
        <form method="POST" action="./CadastrarAutor.php" id="formulario">
            <div class="inputs-container">
                <label>Nome:</label>
                <input type="text" id="nomeAutor" name="nomeAutor" required>
                <label>Descrição:</label>
                <textarea name="descriAutor" id="descriAutor" name="descriAutor"  cols="30" rows="10" style="color: black; padding: 5px" required maxlength="500"></textarea>
                <button type="submit" onclick="return verificar()">Cadastrar</button>
            </div>
        </form>
    </main>
</body>

</html>