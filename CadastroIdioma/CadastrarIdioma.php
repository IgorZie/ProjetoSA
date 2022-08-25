<?php

require_once '../Database/conexao.php';

$idioma = $_POST['idioma'];

$queryCadastrar = "INSERT INTO idioma (Descricao_Idioma) VALUE ('$idioma')";

$execquery = mysqli_query($conexao, $queryCadastrar);

header('Location: ./CadastroIdioma.php');