<?php
session_start();

require_once '../Database/conexao.php';

if (empty($_SESSION['email']))
{
    header ('Location: ../TelaLogin/TelaLogin.php');
    exit();
}

$usuario = $_SESSION['email'];
$statusLivro = $_POST['selectStatus'];
$livro = $_POST['idLivro'];

$queryUsuario = "SELECT * FROM usuario WHERE Email='$usuario'";
$execUsuario = mysqli_query($conexao, $queryUsuario);
$arrayUsuario = mysqli_fetch_assoc($execUsuario);
$usuario = $arrayUsuario['Id_Usuario'];

$queryBusca = "SELECT * FROM usuario_livro WHERE (Id_Usuario='$usuario') AND (Id_Livro='$livro')";
$execBusca = mysqli_query($conexao, $queryBusca);
$rowBusca = mysqli_num_rows($execBusca);
// var_dump($execBusca); die;
if ($rowBusca == 0){

    $queryAdicionar = " INSERT INTO usuario_livro(Id_Status_Livro, Id_Usuario, Id_Livro) VALUES ('$statusLivro', " . $arrayUsuario['Id_Usuario'] .", '$livro')";

    $execAdicionar = mysqli_query($conexao, $queryAdicionar);

    header("Location: http://localhost/ProjetoSA/Pagina-livro/index.php?idLivro=". $livro ."");
    exit();

} else if ($rowBusca == 1){

    $queryUpdate = " UPDATE usuario_livro SET Id_Status_Livro='$statusLivro' WHERE (Id_Livro='$livro') AND (Id_Usuario='$usuario')";
    $execUpdate = mysqli_query($conexao, $queryUpdate);

    header("Location: http://localhost/ProjetoSA/Pagina-livro/index.php?idLivro=". $livro ."");
    exit();
}






