<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <title>Tela Recuperação de Senha</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="./style.css">
    <script src="./source.js"></script>
</head>

<body>
    <header>
        <h1>Redefinir senha</h1>
    </header>

    <main>

        <form action="../PHPMailer/index.php" method="POST" style="margin-right: 10px;" class="formEmail">
        <legend>1º Passo</legend>
            <section class="inputs-container">
                <div class="inputs-container">
                    <!-- <label>Email:</label> -->
                    <input type="email" id="email" name="email" placeholder="Digite o email" required>
                    <button type="submit">Enviar Email</button>
                </div>
            </section>
        </form>

        <form action="./redefinirSenha.php" method="POST" id="formulario">
            <legend>2º Passo</legend>
            <section class="inputs-container">

                <div class="inputs-container">
                    <input type="text" id="chave" name="chave" placeholder="Chave de recuperação" maxlength="8" minlength="8" required>
                </div>

                <div class="password-container">
                    <input type="password" id="senha" name="senha" class="field-password" placeholder="Nova Senha" minlength="6" required>
                    <i class="fa-solid fa-eye" id="eye" onclick="showPassword()"></i>
                    <i class="fa-solid fa-eye-slash" id="eye-slash" onclick="showPassword()"></i>
                </div>

                <div class="password-container">
                    <input type="password" id="senha2" name="senha2" class="field-password2" placeholder="Confirmar Senha" minlength="6" required>
                </div>

            </section>

            <button type="submit" id="btn-login" onclick="return conferirSenha()">Redefinir Senha</button>

        </form>
    </main>


</body>

</html>