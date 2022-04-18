<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Recuperação de Senha</title>
    <link rel="stylesheet" href="./style.css">
    <script src="./source.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>
</head>

<body>
    <header>
        <h1>Redefinir senha</h1>
    </header>

    <main>
        <form>
            <input type="hidden">
            <section class="inputs-container">
                <input type="email" placeholder="example@gmail.com">

                <div class="password-container">
                    <input type="password" id="field-password" class="field-password" placeholder="Nova Senha">
                    <i class="fa-solid fa-eye" id="eye" onclick="showPassword()"></i>
                    <i class="fa-solid fa-eye-slash" id="eye-slash" onclick="showPassword()"></i>
                </div>

                <div class="password-container">
                    <input type="password" id="field-password2" class="field-password2" placeholder="Confirmar Senha">
                    <i class="fa-solid fa-eye" id="eye2" onclick="showPassword2()"></i>
                    <i class="fa-solid fa-eye-slash" id="eye-slash2" onclick="showPassword2()"></i>
                </div>

            </section>

            <button id="btn-login">Redefinir Senha</button>

        </form>
    </main>


</body>

</html>