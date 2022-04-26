<?php
include('./verifica_login.php');
?>

<h2>Olá, <?=$_SESSION['email']?></h2>
<h2><a href="./logout.php">Sair</a></h2>