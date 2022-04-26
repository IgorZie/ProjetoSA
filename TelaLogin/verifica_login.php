<?php
session_start();
// verifica se a session NÃO existir, redirecionar para a tela de Login
if (!$_SESSION['email']){
    header('Location: ./TelaLogin.php');
    exit();
}