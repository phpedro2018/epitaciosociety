<?php 
require_once("php/config.php"); 
include 'php/head.php';


if(empty($_SESSION['admLogin'])){
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}
?>


<div class="container">
	<br/>
	<img src="imagens/logo1.png" alt="" class="rounded mx-auto d-block" width="200" height="200">
	<div class="row">
		<div class="col-md-6">
			<a href="paineladm.php" class="btn btn-warning btn-lg btn-block">Buscar</a>
		</div>
		<div class="col-md-6">
			<a href="#" class="btn btn-warning btn-lg btn-block">Listagem geral</a>
		</div>
	</div>
</div>


<center>
<div style="position:fixed;bottom: 0;margin: auto;width: 100%; background-color: #f2f2f2">
	<?php require_once("php/rodape.php"); ?>

</div>
</center>