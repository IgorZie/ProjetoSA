<?php

$ini_array = parse_ini_file('config.ini');

$conexao = mysqli_connect($ini_array['HOST'], $ini_array['DBUSER'], $ini_array['DBSENHA'], $ini_array['DBNAME']);
$conexao->set_charset("utf8");

if (!$conexao){
    die('Falha na conexão com o banco');
}