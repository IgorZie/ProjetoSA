<?php
require_once('../Database/conexao.php');
include('../TelaLogin/verifica_login.php');
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Icon/icon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- load icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- fonts text -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="./style.css">
    <title>Estante</title>
</head>

<body>
    <div class="container-fluid2">

        <header>
            <!-- seção que aponta para outras paginas/areas -->
            <nav>
                <!-- âncora, com href cria ligação com endereços -->
                <a class="logo" href="../HomePage/index.php">sorvil</a>
                <!-- search button -->
                <form class="search_form" action="../HomePage/index.php" method="POST" enctype="multipart/form-data">
                    <input type="text" placeholder="Pesquisar..." name="search">
                    <!-- i = parte do texto que é destacada -->
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                <!-- lista desordenada,  -->
                <ul class="nav-list">
                    <!-- elementos -->
                    <li><a href="">Estante</a></li>
                    <li><a href="../TelaEditar/TelaEditar.php">Perfil</a></li>
                    <?php
                    if (empty($_SESSION['email'])) {
                        echo "<li><a href='../TelaLogin/TelaLogin.php'>Entrar</a></li>";
                    } else {
                        echo "<li><a href='../TelaLogin/logout.php'>Sair</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </header>


        <main>
            <?php
            $queryBuscaUsuario = "SELECT * FROM usuario WHERE Email='$email'";
            $resultQueryBusca = mysqli_query($conexao, $queryBuscaUsuario);
            $arrayUsuario = mysqli_fetch_array($resultQueryBusca);
            $idUsuario = $arrayUsuario['Id_Usuario'];
            $queryLivro = "SELECT * FROM usuario_livro ul 
            JOIN livro li ON ul.Id_Livro=li.Id_Livro 
            JOIN status_livro sl ON sl.Id_Status_Livro=ul.Id_Status_Livro
            WHERE Id_Usuario='$idUsuario'";
            $resultQueryLivro = mysqli_query($conexao, $queryLivro);
            $row = mysqli_num_rows($resultQueryLivro);
            if ($row > 0) {
                echo "<div class='row'>";
                $cont = 0;
                while ($rowLivro = mysqli_fetch_assoc($resultQueryLivro)) {
                    $text = ($cont > 4) ? 'h-100' : '';
                    echo "<div class='col mb-2 pr-0'><div class='div-card {$text}'>"
                        . '<div class="card" style="width: 16rem;">'
                        . '<button class="btn btn-default">'
                        . "<a href='../Pagina-livro/index.php?idLivro=" . $rowLivro['Id_Livro'] . "'><img class='card-img-top' src='../Uploads/" . $rowLivro['Id_Livro'] . ".jpg' alt='Card image cap'></a>"
                        . '</button>'
                        . '<div class="card-body">'
                        . "<h5 class='card-title'>" . $rowLivro['Titulo_Livro'] . "</h5>"
                        . "<p class='card-text'>" . $rowLivro['Descricao_Status'] . "</p>"
                        . '</div>'
                        . '</div>'
                        . '</div></div>';

                    $cont++;
                }
                echo "</div>";
            } else {
                echo "<h2 style='height: 100%'>Você não possui livros registrados.<br>Pesquise um livro e adicione a sua estante</h2>";
            }

            ?>
            
            <footer>
                <ul class="foot-list">
                    <li>Sugira livros em: sorvil.joinville@gmail.com</li>
                    <li>© Copyright 2022 Sorvil</li>
                </ul>
            </footer>
            
        </main>

    </div>
</body>

</html>