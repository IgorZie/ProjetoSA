<?php
session_start();
//unset($_SESSION['NOMEDASESSAO']); // DESTROI APENAS A SESSÃO QUE PREFERIR, CASO SEJA NECESSÁRIO NA APLICAÇÃO
session_destroy(); // DESTROY - ELE DESTROI TODAS AS SESSÕES
header('Location: ../HomePage/index.php');
exit();