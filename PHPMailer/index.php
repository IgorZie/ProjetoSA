<?php
require_once '../Database/conexao.php';

require_once("src/PHPMailer.php");
require_once("src/SMTP.php");
require_once("src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$email = $_POST['email'];
// var_dump($_POST); die;
$mail = new PHPMailer(true);

$queryBusca = "SELECT * FROM usuario WHERE Email='$email'";
$resultadoQuery = mysqli_query($conexao, $queryBusca);
$array = mysqli_fetch_array($resultadoQuery);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sorvil.joinville@gmail.com';
    $mail->Password = 'Sorvil@2022'; // senha endereço de email "pai"
    $mail->Port = 587;

    $mail->setFrom('sorvil.joinville@gmail.com');
    $mail->addAddress("$email");

    $mail->isHTML(true);
    $mail->Subject = utf8_decode("Recuperação de Senha");
    $mail->Body = "Olá {$array['Nome_Usuario']} você esqueceu sua senha!<br>Aqui está sua chave de recuperação: {$array['Senha_Randomica']} para redefinir sua senha <a href='http://localhost/ProjetoSA/TelaSenha/TelaSenha.php'>Clique Aqui</a> e vá para a 2ª etapa.<br>Agradecemos sua partipação em nosso site!";
    $mail->AltBody = "Recuperação de senha";

    if ($mail->send()){
        echo "Email enviado com sucesso";
    } else {
        echo "Email não enviado";
    }

    echo '<script type="text/javascript">';
    echo 'alert("Email enviado com sucesso!\nVerifique seu endereço de email.");';
    echo 'window.location.href = "http://localhost/ProjetoSA/TelaSenha/TelaSenha.php";';
    echo '</script>';

} catch (Exception $e) {
     echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}