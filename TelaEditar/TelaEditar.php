<?php
require_once('../Database/conexao.php');
include('../TelaLogin/verifica_login.php');
$email = $_SESSION['email'];

function getEstado($id, $idEstado){
    return ($id == $idEstado)? 'selected': '';
}

function getCidade($id, $idCidade){
    return ($id == $idCidade)? 'selected': '';
}

function voltar(){
    header('Location: ../HomePage/index.php');
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <title>Editar Usuário</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9c920a4175.js" crossorigin="anonymous" defer></script>

    <link rel="stylesheet" href="./style.css">
    <script src="./source.js" defer></script>

</head>


<body>
    <header>
        <h1>Editar Cadastro</h1>
    </header>

    <main>
        <?php

            $queryBuscarUsuario = "SELECT * FROM usuario WHERE Email='$email'";
            $resultQueryBusca = mysqli_query($conexao, $queryBuscarUsuario);
            while ($user = mysqli_fetch_assoc($resultQueryBusca)){
                $idUsuario = $user['Id_Usuario'];
                $nome = $user['Nome_Usuario'];
                $apelido = $user['Apelido_Usuario'];
                $sexo = $user['Sexo'];
                $dataNasc = $user['Data_Nascimento'];
                $email = $user['Email'];
                $idCidade = $user['Id_Cidade'];
            }
            
            $queryBuscarCidade = "SELECT * FROM cidade WHERE Id_Cidade='$idCidade'";
            $resultQueryBusca = mysqli_query($conexao, $queryBuscarCidade);
            while ($cidade = mysqli_fetch_assoc($resultQueryBusca)){
                $idEstado = $cidade['Id_Estado'];
            }


        ?>

        <form action="./editar.php" method="POST" id="formulario">

            <section class="inputs-container">

                <div>
                    <input type="hidden" name="id" id="id" value="<?=$idUsuario?>">
                </div>

                <div class="">
                    <label>Nome Completo:</label>
                    <input type="text" id="nome" name="nome" minlength="3" class="" required value="<?=$nome?>">
                </div>

                <div class="">
                    <label>Apelido:</label>
                    <input type="text" id="apelido" name="apelido" minlength="3" maxlength="14" class="" required value="<?=$apelido?>">
                </div>

                <div class="">
                    <label>Email:</label><br>
                    <input type="email" name="email" id="email" class="" required value="<?=$email?>">
                </div>

                <div class="">
                    <label>Sexo:</label><br>
                    <select id="sexo" name="sexo" class="selecionar" required>
                        <option value="F" <?=($sexo == "F")?'selected': '';?>>Feminino</option>
                        <option value="M" <?=($sexo == "M")?'selected': '';?>>Masculino</option>
                    </select>
                </div>

                <div class=''>
                    <label>Data de Nascimento:</label>
                    <input type="date" id="dataNasc" name="dataNasc" required value="<?=$dataNasc?>">
                </div>

                <div class="">
                    <label>Estado:</label><br>
                    <select id="estado" name="estado" class="selecionar" required>
                        <option></option>
                        <?php
                        $queryEstado = "SELECT * FROM Estado ORDER BY Nome_Estado ASC";
                        $resultQuery = mysqli_query($conexao, $queryEstado);
                        while ($rowEstado = mysqli_fetch_assoc($resultQuery)) {
                            echo '<option value="' . $rowEstado["Id_Estado"] . '" '. getEstado($rowEstado["Id_Estado"], $idEstado) .'> ' . $rowEstado["Nome_Estado"] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="">
                    <label>Cidade:</label><br>
                    <select id="cidade" name="cidade" class="selecionar" required>
                    <?php
                        $queryCidade = "SELECT * FROM Cidade;";
                        $resultQuery = mysqli_query($conexao, $queryCidade);
                        while ($rowCidade = mysqli_fetch_assoc($resultQuery)) {
                            echo '<option value="' . $rowCidade["Id_Cidade"] . '" '. getCidade($rowCidade["Id_Cidade"], $idCidade) .'> ' . $rowCidade["Nome_Cidade"] . '</option>';
                        }
                    ?>
                    </select>
                </div>

                <div class="">
                    <button type="submit" id="btn-login" onclick="return conferirSenha()">Editar</button>
                    <button type="button" onclick="voltar()">Cancelar</button>
                </div>
            </section>
        </form>

        <!-- <script src="http://code.jquery.com/jquery-1.5.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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