<?php

require_once '../Database/conexao.php';

$categoria = $_POST['categoria'];

$queryCadastrar = "INSERT INTO categoria (Descricao_Categoria) VALUE ('$categoria')";

$execquery = mysqli_query($conexao, $queryCadastrar);

header('Location: ./CadastroCategoria.php');