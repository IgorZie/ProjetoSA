<?php

require_once("src/PHPMailer.php");
require_once("src/SMTP.php");
require_once("src/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'igor_zielosko@estudante.sesisenai.org.br';
    $mail->Password = ''; // senha endereço de email "pai"
    $mail->Port = 587;

    $mail->setFrom('igor_zielosko@estudante.sesisenai.org.br');
    $mail->addAddress('igor_zielosko@estudante.sesisenai.org.br');

    $mail->isHTML(true);
    $mail->Subject = "Teste de email via gmail";
    $mail->Body = "Ihuuuuuuuuuuuuuuuuuuuuuuuuuuul<br>Chegou o email teste do <strong>Igor Zielosko</strong><br>Para redefinir sua senha acesse o link: <a href='localhost/ProjetoSA/TelaSenha/TelaSenha.php'>Recuperar Senha</a>";
    $mail->AltBody = "Chegou o email teste do Igor Zielosko";

    if ($mail->send()){
        echo "Email enviado com sucesso";
    } else {
        echo "Email não enviado";
    }

} catch (Exception $e) {
     echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}