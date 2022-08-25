<?php

require_once '../Database/conexao.php';

$nome       = $_POST['nome'];
$apelido    = $_POST['apelido'];
$email      = $_POST['email'];
$sexo       = $_POST['sexo'];
$dataNasc   = str_replace('-', '', $_POST['dataNasc']);
$cidade     = $_POST['cidade'];
$senha      = $_POST['senha'];

$buscaEmail = "SELECT * FROM usuario WHERE Email='$email'";
$execEmail = mysqli_query($conexao, $buscaEmail);
$rowEmail = mysqli_num_rows($execEmail);
// var_dump($execEmail); die;

    if ($rowEmail >= 1) {
        echo '<script type="text/javascript">';
        echo 'alert("Email já está sendo usado!");';
        echo 'window.location.href = "http://localhost/ProjetoSA/TelaLogin/TelaLogin.php";';
        echo '</script>';
    } else if ($rowEmail == 0) {
        $queryCadastrar = "INSERT INTO usuario (Nome_Usuario, Apelido_Usuario, Sexo, Data_Nascimento, Email, Senha, Id_Cidade, Status_Usuario, Permissao, Senha_Randomica)
                   VALUES ('$nome', '$apelido', '$sexo', '$dataNasc', '$email', md5('$senha'), '$cidade' ,'ativo', 'user', ROUND(RAND()*100000000))";

        $execquery = mysqli_query($conexao, $queryCadastrar);

        echo '<script type="text/javascript">';
        echo 'alert("Cadastrado com sucesso!");';
        echo 'window.location.href = "http://localhost/ProjetoSA/TelaLogin/TelaLogin.php";';
        echo '</script>';
    }

