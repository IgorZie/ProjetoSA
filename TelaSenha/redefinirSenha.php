<?php

require_once '../Database/conexao.php';

$chave = $_POST['chave'];
$senha = $_POST['senha'];
$confirmSenha = $_POST['senha2'];

$queryBuscar = "SELECT * FROM usuario WHERE Senha_Randomica=$chave";
$resultadoQuery = mysqli_query($conexao, $queryBuscar);

$row = mysqli_num_rows($resultadoQuery);

if ($row == 1){
    $queryRedefinir = "UPDATE usuario SET Senha=md5('$senha') WHERE Senha_Randomica=$chave";
    $queryChave = "UPDATE usuario SET Senha_Randomica=ROUND(RAND()*100000000) WHERE Senha_Randomica=$chave";
    $execQuery = mysqli_query($conexao, $queryRedefinir);
    $execQueryChave = mysqli_query($conexao, $queryChave);

    echo '<script type="text/javascript">';
    echo 'alert("Senha redefinida com sucesso!");';
    echo 'window.location.href = "http://localhost/ProjetoSA/TelaLogin/TelaLogin.php";';
    echo '</script>';
}

