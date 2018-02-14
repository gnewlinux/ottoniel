<?php $painel_atual = "portaria"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel da Portaria</title>
	<?php require "../config.php"; ?>
</head>
<body>
<h2>Consulta Portaria</h1>

<form name="" method="post" action="" enctype="multipart/form-data">
<input type="text" name="cpf" value="">
<input class="input" type="submit" name="send" value="">

<?php
					if(isset($_POST['send'])){
						$cpf = $_POST['cpf'];


						if($cpf == ''){
							echo "<script language='javascript'>window.alert('Por favor, digite o número de matrícula ou CPF.')</script></h2>";
						} else{
							$sqlCpf = "SELECT * FROM matricula WHERE cpf = '$cpf' OR id = '$cpf'";
							$resultado = mysqli_query($conexao, $sqlCpf);
						}
							if(mysqli_num_rows($resultado) == ''){
								echo "<h1>Não existe nenhum registro</h1>";

							} else if(mysqli_num_rows($resultado) > 0){
								while ($res_2 = mysqli_fetch_assoc($resultado)) {
									$matricula = $res_2['id'];
									$cpf = $res_2['cpf'];
									$nome = $res_2['nome'];

									echo $nome;
								}

							} else {
									echo "Dados incorretos";
							}
					}
?>
</form>

</body>
</html>