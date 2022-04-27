<?php
session_start();
require_once '../Database/conexao.php';

$id         = $_POST['id'];
$nome       = $_POST['nome'];
$apelido    = $_POST['apelido'];
$email      = $_POST['email'];
$sexo       = $_POST['sexo'];
$dataNasc   = str_replace('-', '', $_POST['dataNasc']);
$cidade     = $_POST['cidade'];

$queryCadastrar = "UPDATE usuario SET Nome_Usuario='$nome', Apelido_Usuario='$apelido', Sexo='$sexo', Data_Nascimento='$dataNasc', Email='$email', Id_Cidade='$cidade' WHERE Id_Usuario='$id'";

$execquery = mysqli_query($conexao, $queryCadastrar);

$_SESSION['email'] = $email;

echo '<script type="text/javascript">';
echo 'alert("Cadastro editado com sucesso!");';
echo 'window.location.href = "http://localhost/ProjetoSA/HomePage/index.php";';
echo '</script>';