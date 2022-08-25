<?php
session_start();

require_once '../Database/conexao.php';

if (empty($_SESSION['email']))
{
    header ('Location: ../TelaLogin/TelaLogin.php');
    exit();
}

$usuario = $_SESSION['email'];
$livro = $_POST['idLivro'];
$nota = $_POST['estrela'];
$comentario = $_POST['comente'];

$queryUsuario = "SELECT * FROM usuario WHERE Email='$usuario'";
$execUsuario = mysqli_query($conexao, $queryUsuario);
$arrayUsuario = mysqli_fetch_assoc($execUsuario);
$usuario = $arrayUsuario['Id_Usuario'];

$queryBusca = "SELECT * FROM usuario_livro WHERE (Id_Usuario='$usuario') AND (Id_Livro='$livro')";
$execBusca = mysqli_query($conexao, $queryBusca);
$rowBusca = mysqli_num_rows($execBusca);

if ($rowBusca == 1){

    $queryUpdate = " UPDATE usuario_livro SET Nota_Avaliacao='$nota' WHERE (Id_Livro='$livro') AND (Id_Usuario='$usuario')";

    if ($comentario != ""){
        $queryUpdateComent = " UPDATE usuario_livro SET Comentario_Avaliacao='$comentario', Data_Inicio=DATE(NOW()) WHERE (Id_Livro='$livro') AND (Id_Usuario='$usuario')";

        $execComent = mysqli_query($conexao, $queryUpdateComent);
    }

    $execUpdate = mysqli_query($conexao, $queryUpdate);

    header("Location: http://localhost/ProjetoSA/Pagina-livro/index.php?idLivro=". $livro ."");
    exit();

} else if ($rowBusca == 0){

    echo '<script type="text/javascript">';
    echo 'alert("Adicione o livro na estante primeiro!");';
    echo 'window.history.back()';
    echo '</script>';

}