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

  <h1 class="mt-5">Editar Usuário:</h1>

  <form name="" method="post" action="" enctype="multipart/form-data">

  <?php 

      $id = $_GET['id'];

      $sqlConsulta = "SELECT * FROM login WHERE id='$id'";
      $resultado = mysqli_query($conexao, $sqlConsulta);
      while ($res = mysqli_fetch_assoc($resultado)) {
          $codigo = $res['id'];
          $nome = $res['nome'];
          $modo = $res['painel'];
          $status = $res['status'];
          
          echo "<p>Nome: <input type='text' name='nome' value='$nome'></p>";
          echo "<p>Senha: <input type='password' name='senha' value='$senha'></p>";

          if($modo == 'admin'){
            $admin = "selected";
          } else if($modo == 'professor'){
            $professor = "selected";
          } else if($modo == 'portaria'){
            $portaria = "selected";
          } else if($modo == 'biblioteca'){
            $biblioteca = "selected";
          } else{
            $aluno = "selected";
          }

          if($status != 'inativo'){
            $ativo = "checked='checked'";
          } else {
            $inativo = "checked='checked'";
          }


          echo "<p>Acesso:
                  <select name='modo'>
                  <option value='admin' $admin>Admin</option>
                  <option value='professor' $professor>Professor</option>
                  <option value='portaria' $portaria>Portaria</option>
                  <option value='biblioteca' $biblioteca>Biblioteca</option>
                  <option value='aluno' $aluno>Aluno</option>
                </select>
                </p>
                <p>Status:
                  <input type='radio' value='ativo' name='status' $ativo> Ativo
                  <input type='radio' value='inativo' name='status' $inativo> Inativo<br>
                </p>";
        }
?>



  <input class="input" type="submit" name="cadastrar" value="SALVAR">
<?php 

  $id = $_GET['id'];

  if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $modo = $_POST['modo'];
    $status = $_POST['status'];
    echo $senha;
    $sqlCadastro = "UPDATE login SET status='$status', senha='$senha', nome='$nome', painel='$modo' WHERE id='$id'";
    $resultado = mysqli_query($conexao, $sqlCadastro);
    echo "<script language='javascript'>window.alert('Modificação realizada com Sucesso!');</script>";
    echo "<script language='javascript'>window.location='usuarios.php';</script>";
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