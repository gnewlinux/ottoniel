<?php $painel_atual = "admin"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<?php require "../config.php"; ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
<body>

<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">ADMINISTRAÇÃO OTTONIEL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="usuarios.php">Usuários</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="alunos.php">Alunos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadastro.php">Cadastro</a>
            </li>
          </ul>
          
          <a class="btn my-2 my-sm-0" type="submit" href="../index.php">Sair</a>
          
        </div>
      </nav>
    </header>


<main role="main" class="container">
  <h1 class="mt-5">Usuários do sistema:</h1>
      <form name="pesquisa" method="post" action="" enctype="multipart/form-data">


        <input type="text" name="valor" value='' placeholder="Código ou Nome" style="padding: 5px; margin-top: 20px; margin-bottom: 10px;" autofocus>

     
        <input name="submit" type="image" src="img/pesquisa.png" value="Place Order" width="38" style="margin-left: 10px;" align="center" />
        <input name="submitted" type="hidden" value="true" />


    <?php 

      if(isset($_POST['submit'])){
        $valor = $_POST['valor'];

        if($valor == ''){
          echo "<script language='javascript'>window.alert('Digite no campo de pesquisa.')</script>";
        }


        if(is_numeric($valor)){
           $sqlConsulta = "SELECT * FROM login WHERE id LIKE '$valor%'";
         } else {
           $sqlConsulta = "SELECT * FROM login WHERE nome LIKE '$valor%'";
         }

     
      $resultado = mysqli_query($conexao, $sqlConsulta);
      
      if(mysqli_num_rows($resultado) == ''){
        echo "<script language='javascript'>window.alert('Não existe nenhum registro.')</script>";
      } else if(mysqli_num_rows($resultado) > 0){
        echo "<p></p>";
          echo "<table style='border-collapse: separate;'>";
            echo "<tr>";
              echo "<td style='background: #CCC; width: 80px; height: 30px; text-align: center;'>Código</td>";
                echo "<td style='background: #BBB; width: 300px; height: 30px; text-align: center;'>Nome do Usuário</td>";
                echo "<td style='background: #CCC; width: 200px; height: 30px; text-align: center;'>Acesso</td>";
              echo "<td style='background: #BBB; width: 200px; height: 30px; text-align: center;'>Status</td>";
          echo "</tr></table>";
        while ($res = mysqli_fetch_assoc($resultado)) {
          
          $codigo = $res['id'];
          $nome = $res['nome'];
          $modo = $res['painel'];
          $status = $res['status'];

          if($modo == 'aluno'){
          echo "<table style='border-collapse: separate;'>";
          echo "</tr><tr>";
          echo "<td style='background: #CCC; width: 80px; height: 30px; text-align: center;'>$codigo</td>
            <td style='background: #BBB; width: 300px; height: 30px; text-align: center;'>$nome</td>
            <td style='background: #CCC; width: 200px; height: 30px; text-align: center;'>$modo</td>
            <td style='background: #BBB; width: 200px; height: 30px; text-align: center;'>$status</td>
            <td style='background: #fff; width: 30px; height: 30px; text-align: center;'><a href='editar.php?id=$codigo'><img src='img/editar.png' height='24'></td>
            <td style='background: #fff; width: 30px; height: 30px; text-align: center;'><a href='usuarios.php?sendDel=true&id=$codigo' onClick=\"return confirm('Você tem certeza que deseja excluir o usuário?')\" style='color: red;'><img src='img/delete.png'></td>
             ";
          echo "</tr></table>";
        }
        }
      }

    }
    ?>
  </form>

<?php

      $sqlConsulta = "SELECT * FROM login";
      $resultado = mysqli_query($conexao, $sqlConsulta);

      if(mysqli_num_rows($resultado) == ''){
        echo "<h1>Não existe nenhum registro</h1>";
      } else if(mysqli_num_rows($resultado) > 0){
        echo "<p></p>";
          echo "<table style='border-collapse: separate;'>";
            echo "<tr>";
              echo "<td style='background: #CCC; width: 80px; height: 30px; text-align: center;'>Código</td>";
                echo "<td style='background: #BBB; width: 300px; height: 30px; text-align: center;'>Nome do Usuário</td>";
                echo "<td style='background: #CCC; width: 200px; height: 30px; text-align: center;'>Acesso</td>";
              echo "<td style='background: #BBB; width: 200px; height: 30px; text-align: center;'>Status</td>";
          echo "</tr></table>";
        while ($res_3 = mysqli_fetch_assoc($resultado)) {
          $codigo = $res_3['id'];
          $nome = $res_3['nome'];
          $modo = $res_3['painel'];
          $status = $res_3['status'];

          if($modo == 'aluno'){
          echo "<table style='border-collapse: separate;'>";
          echo "</tr><tr>";
          echo "<td style='background: #CCC; width: 80px; height: 30px; text-align: center;'>$codigo</td>
            <td style='background: #BBB; width: 300px; height: 30px; text-align: center;'>$nome</td>
            <td style='background: #CCC; width: 200px; height: 30px; text-align: center;'>$modo</td>
            <td style='background: #BBB; width: 200px; height: 30px; text-align: center;'>$status</td>
            <td style='background: #fff; width: 30px; height: 30px; text-align: center;'><a href='editar_aluno.php?id=$codigo'><img src='img/editar.png' height='24'></td>
            <td style='background: #fff; width: 30px; height: 30px; text-align: center;'><a href='alunos.php?sendDel=true&id=$codigo' onClick=\"return confirm('Você tem certeza que deseja excluir o usuário?')\" style='color: red;'><img src='img/delete.png'></td>
             ";
          echo "</tr></table>";
          }
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