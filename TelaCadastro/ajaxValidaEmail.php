<?php
require_once '../Database/conexao.php';

if (isset($_POST['email'])){

    $email = $_POST['email'];

    $buscaEmail = "SELECT * FROM usuario WHERE Email='$email'";
    $execEmail = mysqli_query($conexao, $buscaEmail);
    $rowEmail = mysqli_num_rows($execEmail);

    if ($rowEmail){
        die("<font color='red'> em uso!</font>");
    } else {
        die("<font color='#00FF7F'> disponível</font>");
    }

}