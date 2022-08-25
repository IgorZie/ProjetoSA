<?php
session_start();
require_once('../Database/conexao.php');
if (isset($_POST['search'])) {
  $filtrar = $_POST['search'];
} else {
  $filtrar = "";
}
$entrou = 0;
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
  <title>Sorvil</title>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</head>

<body>


  <div class="container-fluid2">
    <header>
      <!-- seção que aponta para outras paginas/areas -->
      <nav>
        <!-- âncora, com href cria ligação com endereços -->
        <a class="logo" href="./index.php">sorvil</a>
        <!-- search button -->
        <form class="search_form" action="../HomePage/index.php" method="POST" enctype="multipart/form-data">
          <input type="text" placeholder="Pesquisar..." name="search" value="<?= $filtrar ?>">
          <!-- i = parte do texto que é destacada -->
          <button type="submit" name="btn-filtro"><i class="fa fa-search"></i></button>
        </form>
        <!-- lista desordenada,  -->
        <ul class="nav-list">
          <!-- elementos -->
          <li><a href="../EstantePage/index.php">Estante</a></li>
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


    <div class="banner">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="./banner/img1.png" alt="First slide" height="310" style="overflow: hidden;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="./banner/img2.png" alt="Second slide" height="310" style="overflow: hidden;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="./banner/img3.png" alt="Third slide" height="310" style="overflow: hidden;">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <aside>
      <div class="aside-conteiner">
        <ul class="categ-list">
          <?php

          $queryCategoria = "SELECT * FROM categoria";
          $resultQuery = mysqli_query($conexao, $queryCategoria);
          while ($rowCategoria = mysqli_fetch_assoc($resultQuery)) {
            echo "<li><a href= 'index.php?id=" . $rowCategoria['Id_Categoria'] . "&action=categoria' id='btn_cat'> " . $rowCategoria['Descricao_Categoria'] . "</a></li>";
            // "<a href='index.php?id=" . $row_user['Id_Cadastro'] . "&action=del' name='btn_del' id='btn_del'>Deletar</a>"
          }
          ?>
        </ul>
      </div>
    </aside>


    <main>

      <?php

      if (isset($_GET['id']) && isset($_GET['action'])) {
        $idCategoria = $_GET['id'];
        if (isset($_GET['action']) == 'categoria') {
          $entrou = 1;

          $queryBusca = "SELECT * FROM livro li
                         JOIN  categoria ca ON ca.Id_Categoria=li.Id_Categoria
                         WHERE ca.Id_Categoria=$idCategoria";


          $resultQuery = mysqli_query($conexao, $queryBusca);
          // $array = mysqli_fetch_assoc($resultQuery);
          $row = mysqli_num_rows($resultQuery);

          echo "<div class='row'>";
          // $contagem = 0;
          while ($rowLivro = mysqli_fetch_assoc($resultQuery)) {
            // $text = ($contagem > 3) ? 'h-100' : '';
            echo "<div class='col mb-2 pr-0' style='padding-left: 0px;'><div class='div-card'>"
              . '<div class="card" style="width: 16rem;">'
              . '<button class="btn btn-default">'
              . "<a href='../Pagina-livro/index.php?idLivro=" . $rowLivro['Id_Livro'] . "'><img class='card-img-top' src='../Uploads/" . $rowLivro['Id_Livro'] . ".jpg' alt='Card image cap'></a>"
              . '</button>'
              . '<div class="card-body">'
              . "<h5 class='card-title'>" . $rowLivro['Titulo_Livro'] . "</h5>"
              . '</div>'
              . '</div>'
              . '</div></div>';

            // $contagem++;
          }

          echo "</div>";

          if ($row == 0) {
            echo "<h2 style='margin-left: 150px; height:100%'>Livros não encontrados com essa categoria</h2>";
          }
        }
      }
      ?>

      <?php
      $queryLivro = "SELECT * FROM livro ORDER BY Id_Livro DESC";
      $resultQuery = mysqli_query($conexao, $queryLivro);

      if (isset($_POST['search'])) {
        // if (isset($_POST['btn-filtro'])) {
        // $ordenacao = "";
        $encontrado = 0;
        $filtrar = $_POST['search'];

        $queryFiltrar = " SELECT *
              FROM livro li
              JOIN livro_autor la ON la.Id_livro=li.Id_Livro
              JOIN autor a ON a.Id_Autor=la.Id_Autor
              WHERE (li.Titulo_Livro LIKE '%$filtrar%' OR a.Nome_Autor LIKE '%$filtrar%')
              GROUP BY li.Titulo_Livro;";

        $resultFiltro = mysqli_query($conexao, $queryFiltrar);

        echo "<div class='row'>";
        $cont = 0;
        while ($rowFiltro = mysqli_fetch_assoc($resultFiltro)) {
          $encontrado = 1;
          $text = ($cont >= 3) ? 'h-100' : '';
          echo "<div class='col mb-2 pr-0'><div class='div-card {$text}'>"
            . '<div class="card" style="width: 16rem;">'
            . '<button class="btn btn-default">'
            . "<a href='../Pagina-livro/index.php?idLivro=" . $rowFiltro['Id_Livro'] . "'><img class='card-img-top' src='../Uploads/" . $rowFiltro['Id_Livro'] . ".jpg' alt='Card image cap'></a>"
            . '</button>'
            . '<div class="card-body">'
            . "<h5 class='card-title'>" . $rowFiltro['Titulo_Livro'] . "</h5>"
            . '</div>'
            . '</div>'
            . '</div></div>';

          $cont++;
        }
        if ($encontrado == 0){
            echo "<h2 style='margin-left: 200px; padding:50px; margin-top:200px; height:100%'>Nenhum livro encontrado</h2>";
        }
        echo "</div>";
      } else if ($entrou == 0) {
        echo "<div class='row'>";
        while ($rowLivro = mysqli_fetch_assoc($resultQuery)) {
          echo '<div class="col mb-2 pr-0"><div class="div-card h-100">'
            . '<div class="card" style="width: 16rem;">'
            . '<button class="btn btn-default">'
            . "<a href='../Pagina-livro/index.php?idLivro=" . $rowLivro['Id_Livro'] . "'><img class='card-img-top' src='../Uploads/" . $rowLivro['Id_Livro'] . ".jpg' alt='Card image cap'></a>"
            . '</button>'
            . '<div class="card-body">'
            . "<h5 class='card-title'>" . $rowLivro['Titulo_Livro'] . "</h5>"
            . '</div>'
            . '</div>'
            . '</div></div>';
        }
        echo "</div>";
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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>