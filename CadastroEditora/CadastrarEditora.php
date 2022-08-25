<?php

require_once '../Database/conexao.php';

$editora = $_POST['editora'];

$queryCadastrar = "INSERT INTO editora (Nome_Editora) VALUES ('$editora')";

$execquery = mysqli_query($conexao, $queryCadastrar);

header('Location: ../CadastroEditora/CadastroEditora.php');