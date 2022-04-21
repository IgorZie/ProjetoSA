<?php

require_once '../Database/conexao.php';

$nome       = $_POST['nome'];
$apelido    = $_POST['apelido'];
$email      = $_POST['email'];
$sexo       = $_POST['sexo'];
$dataNasc   = str_replace('-', '', $_POST['dataNasc']);
$cidade     = $_POST['cidade'];
$senha      = $_POST['senha'];

$queryCadastrar = "INSERT INTO usuario (Nome_Usuario, Apelido_Usuario, Sexo, Data_Nascimento, Email, Senha, Id_Cidade, Status_Usuario, Permissao, Senha_Randomica)
                   VALUES ('$nome', '$apelido', '$sexo', '$dataNasc', '$email', md5('$senha'), '$cidade' ,'ativo', 'user', ROUND(RAND()*100000000))";

$execquery = mysqli_query($conexao, $queryCadastrar);

header('Location: ../TelaLogin/TelaLogin.php');