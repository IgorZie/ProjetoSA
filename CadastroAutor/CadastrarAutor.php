<?php

require_once '../Database/conexao.php';

$nome = $_POST['nomeAutor'];
$descricao = $_POST['descriAutor'];

$queryCadastrar = "INSERT INTO autor(Nome_Autor, Descricao_Autor) VALUE ('$nome', '$descricao')";

$execquery = mysqli_query($conexao, $queryCadastrar);

header('Location: ./CadastroAutor.php');