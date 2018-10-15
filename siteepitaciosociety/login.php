<?php
require_once("php/config.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
	*{font-family: sans-serif; text-align: center;}
	.caixalogin{border:1px solid orange; width: 25%; padding:2%; margin: auto; margin-top: 4%;}
	img{margin: auto;}
	input{width: 97%; height: 40px;}
	input[type="submit"]{background-color: orange; color:#fff; border:none; border-radius: 5px;}
	.alerta{background-color: #FF7256; padding: 2%; width: 20%; margin:auto; color:#fff;}

	@media screen and (max-width: 768px) {
		.caixalogin{width: 80%;}
		.alerta{width: 80%;} 
	}
</style>

<?php 

	require 'classes/usuarios.class.php';
	$u = new Usuarios();

	if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
		$usuario = addslashes($_POST['usuario']);
		$senha = addslashes($_POST['senha']);

		if($u->loginADM($usuario, $senha)){
				?>
				<script type="text/javascript"> window.location.href="adm.php";</script>
				<?php 
			} else {
				?>
				<div class="alerta">
					Usuários e/ou Senha incorretos :(
				</div>
				<?php
			}
	}


	?>

<div class="caixalogin">
	<img src="imagens/logo1.png" alt="" width="200px" height="200px">
	<form method="POST">
		<label for="usuarioadm">Usuário Administrador</label>
		<input type="text" name="usuario" id="usuario" required>
		<br/>
		<label>Senha</label><br/>
		<input type="password" name="senha" id="senha" required>
		<br/><br/>
		<input type="submit" value="Acessar">
	</form>
	<a href="index.php" style="text-decoration: none;">Voltar ao site</a>
</div>