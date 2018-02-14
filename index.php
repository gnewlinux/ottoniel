<!DOCTYPE html>
<html>
<head>
	<title>OTTONIEL ADMIN</title>
	<?php require ("conexao.php"); ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>
      
	<div id="caixa_login">
		<img src="img/logo.png">
	<form name="form" method="post" action="" enctype="multipart/form-data">
		<p>Código de Acesso:</p>
		<input type="text" name="code">
		<p>Senha:</p>
		<input type="password" name="password"><br>
		<input type="submit" name="button" class="input" value="Entrar">

				<?php
					if(isset($_POST['button'])){
						$code = $_POST['code'];
						$password = $_POST['password'];
						echo $code;
						if($code == ''){
							echo "<h2>Por favor, digite o código de acesso.</h2>";
						} else if($password == ''){
							echo "<h2>Por favor, digite sua senha.";
						} else{
							$sql = "SELECT * FROM login WHERE id = '$code' AND senha = '$password'";
							$result = mysqli_query($conexao, $sql);
							if(mysqli_num_rows($result) > 0){
								
								while ($res_1 = mysqli_fetch_assoc($result)) {
									$status = $res_1['status'];
									$code = $res_1['id'];
									$senha = $res_1['senha'];
									$nome = $res_1['nome'];
									$painel = $res_1['painel'];

									if($status == 'inativo'){
										echo "Usuario Inativo";
									} else {

										session_start();
										$_SESSION['id'] = $code;
										$_SESSION['senha'] = $senha;
										$_SESSION['nome'] = $nome;
										$_SESSION['painel'] = $painel;

										if($_SESSION['painel'] == 'admin'){
											echo "<script language='javascript'>window.location='admin';</script>";
										} else if($painel == 'professor') {
											echo "<script language='javascript'>window.location='professor';</script>";
										} else if($painel == 'aluno') {
											echo "<script language='javascript'>window.location='aluno';</script>";
										} else if($painel == 'portaria') {
											echo "<script language='javascript'>window.location='portaria';</script>";
										} else if($painel == 'biblioteca') {
											echo "<script language='javascript'>window.location='biblioteca';</script>";
										}

									}
								}

							} else {
								echo "Dados incorretos";
							}
						}
					}
				?>
	</form>
</div>

</body>
</html>