<?php

require_once('./Database/conexao.php');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$queryCidades = "SELECT * FROM Cidade WHERE Id_Estado='".$_POST["id"]."'";
$pegaCidades = mysqli_query($conexao, $queryCidades);
$rowCidade = mysqli_fetch_all($pegaCidades, MYSQLI_ASSOC);


foreach ($rowCidade as $cidade){
    echo '<option value="'.$cidade["Id_Cidade"].'"'.'>'.$cidade["Nome_Cidade"].'</option>';
}
