<?php 
session_start();
unset($_SESSION['admLogin']);
?>

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">


<div class="container">
	<div class="row justify-content-center">
		<img src="imagens/logo1.png" alt="" width="250" height="250" style="text-align: center;"> 
	</div>

	<div class="row justify-content-center">
		<div class="alert alert-danger" role="alert">
			Você saiu da área do administrador!
		</div>
	</div>
	
	<div class="row justify-content-center">
		<a href="index.php" class="btn btn-outline-success">Clique aqui para concluir e voltar ao site</a>
	</div>


</div>	