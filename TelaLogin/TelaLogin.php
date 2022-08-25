<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <title>Tela Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <script src="./source.js" defer></script>
    <link rel="stylesheet" href="./style.css">
    
</head>

<body>
    <header>
        <h1>Login</h1>
    </header>

    <main>
       
        <form method="POST" action="./login.php">
            <?php
                if(isset($_SESSION['nao_autenticado'])):
            ?>
            <p style="background: red;">ERRO: Usuário ou senha inválidos.</p>
            <?php
            endif;
            unset($_SESSION['nao_autenticado']);
            ?>
            <section class="inputs-container">
                <input type="email" id="email" name="email" placeholder="Email" required>

                <div class="password-container">
                    <input type="password" id="field-password" name="senha" class="field-password" placeholder="*********" required>
                    <i class="fa-solid fa-eye" id="eye" onclick="showPassword()"></i>
                    <i class="fa-solid fa-eye-slash" id="eye-slash" onclick="showPassword()"></i>
                </div>
            </section>

            <section class="password-infos">
                <div>
                    <input type="checkbox">
                    <span>Lembrar senha?</span>
                </div>

                <a href="../TelaSenha/TelaSenha.php">Esqueceu sua senha?</a>
            </section>

            <button id="btn-login">Login</button>

            <footer>
                <span>Ainda não tem uma conta? <a href="../TelaCadastro/TelaCadastro.php">Cadastra-se</a></span>
            </footer>
        </form>
    </main>


</body>

</html>