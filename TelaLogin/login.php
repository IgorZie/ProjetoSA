<?php
// SEMPRE QUE TRABALHAMOS COM SESSION DEVEMOS INICIAR A SESSION NO COMEÇO DO ARQUIVO
session_start();

require_once '../Database/conexao.php';

// verificar se os campos estão vindo vazios no metodo POST (exemplo: colocar a url do login.php sem passar pelo form)
if (empty($_POST['email']) || empty($_POST['senha']))
{
    header ('Location: ./TelaLogin.php');
    exit();
}

// uma segurança para ataques de mysql injection
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT Id_Usuario, Email, Permissao FROM usuario WHERE Email='{$email}' AND senha=md5('{$senha}')";

$resultQuery = mysqli_query($conexao, $query);

$array = mysqli_fetch_assoc($resultQuery);

// verifica se teve alguma linha afetada pela execução da query (vai retornar 1 ou 0)
$row = mysqli_num_rows($resultQuery);

if ($array['Permissao'] == 'adm'){
    header('Location: ../ListarLivros/index.php');
    exit();
}

if ($row == 1)
{
    $_SESSION['email'] = $email;
    $_SESSION['role'] = $array['Permissao'];
    // exemplo para redirecionar o usuario
    header('Location: ../HomePage/index.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: ./TelaLogin.php');
    exit();
}