<?php require_once('../Database/conexao.php') ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <title>Cadastro Usuário</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="./style.css">
    <script src="./source.js" defer></script>

</head>


<body>
    <header>
        <h1>Cadastro de Usuário</h1>
    </header>

    <main>

        <form action="./CadastrarUsuario.php" method="POST" id="formulario">

            <section class="inputs-container">

                <div class="">
                    <label>Nome Completo:</label>
                    <input type="text" id="nome" name="nome" minlength="3" class="" required>
                </div>

                <div class="">
                    <label>Apelido:</label>
                    <input type="text" id="apelido" name="apelido" minlength="3" maxlength="14" class="" required>
                </div>

                <div class="">
                    <label>Email:</label><span id="resultadoEmail"></span><br>
                    <input type="email" name="email" id="email" placeholder="nome@exemplo.com" class="" required>
                    
                </div>

                <div class="">
                    <label>Sexo:</label><br>
                    <select id="sexo" name="sexo" class="selecionar" required>
                        <option></option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    </select>
                </div>

                <div class=''>
                    <label>Data de Nascimento:</label>
                    <input type="date" id="dataNasc" name="dataNasc" class="" placeholder="dd/mm/yyyy" required>
                </div>

                <div class="">
                    <label>Estado:</label><br>
                    <select id="estado" name="estado" class="selecionar" required>
                        <option></option>
                        <?php
                        $queryEstado = "SELECT * FROM Estado ORDER BY Nome_Estado ASC";
                        $resultQuery = mysqli_query($conexao, $queryEstado);
                        while ($rowEstado = mysqli_fetch_assoc($resultQuery)) {
                            echo '<option value="' . $rowEstado["Id_Estado"] . '"> ' . $rowEstado["Nome_Estado"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="">
                    <label>Cidade:</label><br>
                    <select id="cidade" name="cidade" class="selecionar" style="display: none;" required></select>
                </div>

                <div class="password-container">
                    <!-- <label>Senha:</label> -->
                    <input type="password" id="senha" name="senha" class="field-password" placeholder="Senha" minlength="6" required>
                    <i class="fa-solid fa-eye" id="eye" onclick="showPassword()"></i>
                    <i class="fa-solid fa-eye-slash" id="eye-slash" onclick="showPassword()"></i>
                </div>

                <div class="password-container">
                    <label>Confirmar senha:</label>
                    <input type="password" id="senha2" name="senha2" class="field-password2" placeholder="Confirmar Senha" minlength="6" required>
                </div>

                <div class="">
                    <button type="submit" id="btn-login" onclick="return conferirSenha()">Cadastrar</button>
                    <button type="button" onclick="voltar()">Cancelar</button>
                </div>
            </section>
        </form>

        <!-- <script src="http://code.jquery.com/jquery-1.5.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            $("#email").keyup(function(e) {
                var email = $(this).val();
                $.post('ajaxValidaEmail.php', {
                    'email': email
                }, function(data) {
                    $("#resultadoEmail").html(data);
                })
            });
        </script>

        <script>
            $("#estado").on("change", function() {
                var idEstado = $("#estado").val();

                $.ajax({
                    url: '../preencherCidade.php',
                    type: 'POST',
                    data: {
                        id: idEstado
                    },
                    beforeSend: function() {
                        $("#cidade").css({
                            'display': 'block'
                        });
                        $("#cidade").html("Carregando...");
                    },
                    success: function(data) {
                        $("#cidade").css({
                            'display': 'block'
                        });
                        $("#cidade").html(data);
                    },
                    error: function(data) {
                        $("#cidade").css({
                            'display': 'block'
                        });
                        $("#cidade").html("Houve um erro ao carregar");
                    }
                });
            });
        </script>

    </main>

    <footer>

    </footer>
</body>

</html>