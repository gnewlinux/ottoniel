




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
	<h1 class="mt-5">Cadastro Biblioteca</h1>
	<p class="lead">Digite sua pesquisa:</p>
<form name="" method="post" action="" enctype="multipart/form-data">
	<p>Nome do Livro: <input type="text" name="nome" value=""></p>
	<p>Autor do Livro: <input type="text" name="autor" value=""></p>
	<p>Status:
	<input type="radio" value="disponivel" name="status"> Disponível
    <input type="radio" value="indisponivel" name="status"> Indisponível<br></p>
	<input class="input" type="submit" name="cadastrar" value="CADASTRAR">
<?php 
	if(isset($_POST['cadastrar'])){
		$nome = $_POST['nome'];
		$autor = $_POST['autor'];
		$status = $_POST['status'];
		echo $status;

		if($nome == '' and $autor == ''){
			echo "<script language='javascript'>window.alert('Por favor, digite os campos de cadastro.')</script>";
		} else {
			$sqlCadastro = "INSERT INTO biblioteca (nome,autor,status) VALUES ('$nome','$autor','$status')";
			$resultado = mysqli_query($conexao, $sqlCadastro);
		}

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