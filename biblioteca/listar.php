<?php $painel_atual = "biblioteca"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Painel da Biblioteca</title>
  <?php require "../config.php"; ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
<body>
<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">OTTONIEL BIBLIOTECA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pesquisa.php">Pesquisa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar.php">Listar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadastro.php">Cadastro</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sair</button>
          </form>
        </div>
      </nav>
    </header>


<main role="main" class="container">
  <h1 class="mt-5">Lista de livros:</h1>
          <?php

              $sqlConsulta = "SELECT * FROM biblioteca ";


              $resultado = mysqli_query($conexao, $sqlConsulta);

              if(mysqli_num_rows($resultado) == ''){
                echo "<h1>Não existe nenhum registro</h1>";
              } else if(mysqli_num_rows($resultado) > 0){
                echo "<p></p>";
                  echo "<table style='border-collapse: separate;'>";
                    echo "<tr>";
                      echo "<td style='background: #CCC; width: 80px; height: 30px; text-align: center;'>Código</td>";
                        echo "<td style='background: #BBB; width: 300px; height: 30px; text-align: center;'>Nome do Livro</td>";
                        echo "<td style='background: #CCC; width: 200px; height: 30px; text-align: center;'>Autor</td>";
                      echo "<td style='background: #BBB; width: 200px; height: 30px; text-align: center;'>Status</td>";
                  echo "</tr></table>";
                while ($res_3 = mysqli_fetch_assoc($resultado)) {
                  $codigo = $res_3['id'];
                  $nome = $res_3['nome'];
                  $autor = $res_3['autor'];
                  $status = $res_3['status'];

                  echo "<table style='border-collapse: separate;'>";
                  echo "</tr><tr>";
                  echo "<td style='background: #CCC; width: 80px; height: 30px; text-align: center;'>$codigo</td>
                    <td style='background: #BBB; width: 300px; height: 30px; text-align: center;'>$nome</td>
                    <td style='background: #CCC; width: 200px; height: 30px; text-align: center;'>$autor</td>
                    <td style='background: #BBB; width: 200px; height: 30px; text-align: center;'>$status</td>
                    <td style='background: #fff; width: 30px; height: 30px; text-align: center;'><a href='editar.php?id=$codigo'><img src='img/editar.png' height='24'></td>
                    <td style='background: #fff; width: 30px; height: 30px; text-align: center;'><a href='usuarios.php?sendDel=true&id=$codigo' onClick=\"return confirm('Você tem certeza que deseja excluir o usuário?')\" style='color: red;'><img src='img/delete.png'></td>
                    ";                    ;
                  echo "</tr></table>";
                }

              } else {
                  echo "Dados incorretos";
              }




?>

</form> 



    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">Ottoniel Junqueira 2018</span>
      </div>
    </footer>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>