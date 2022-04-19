<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro Autor</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="./styleCadAutor.css">

</head>

<body>
    <header>
        <h1>Cadastrar Autor</h1>
    </header>

    <main>
        <form>
            <div class="inputs-container">
                <label>Nome:</label>
                <input type="text" id="nomeAutor" name="nomeAutor" style="text-transform: uppercase">
                <label>Descrição:</label>
                <textarea name="descriAutor" id="descriAutor" name="descriAutor"  cols="30" rows="10" style="color: black; padding: 5px"></textarea>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </main>


</body>

</html>