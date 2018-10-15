<?php 
include 'php/head.php';
require_once("php/config.php"); 


if(empty($_SESSION['admLogin'])){?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}

$reserva = new Reservas; 
		
		if(isset($_POST['status']) && !empty($_POST['status'])){
		
			$status = addslashes($_POST['status']);
			$reserva->confirmarReserva($status, $_GET['idReserva']);
		?>
		<div class="alert alert-success">
			Confirmado com Sucesso
			<script type="text/javascript">window.location.href="paineladm.php",3000;</script>
		</div>
		<?php
		exit;
		} 

if(isset($_GET['idReserva']) && !empty($_GET['idReserva'])) {
	$idReserva = addslashes($_GET['idReserva']);
} else {
?>
	<script type="text/javascript">window.location.href="paineladm.php";</script>
<?php
	exit;
}
?>


<style>
	input[type="text"]{background-color: #e9ecef;border:none;}
</style>

<div class="container">
	<img src="imagens/logo1.png" alt="" class="rounded mx-auto d-block" width="200" height="200">
	<br/>
		<h1 style="text-align: center">Confirmar Reserva</h1>
	<div class="jumbotron">
		<h3>Informações da Reserva:</h3>
		<?php 
	
		
		
		
		$sqlReservas  = $reserva->getReservas($idReserva);
			foreach($sqlReservas as $reservas):

			?>
	
			Nº da Reserva: <?php echo $reservas['idReserva'];?> <br/>
			Nome: <?php echo $reservas['nome'];?><br/>
			Contato: <?php echo $reservas['celular'] ;?><br/>
			Campo nº:<?php echo $reservas['campoReservado'];?><br/>
			Data: <?php echo date("d/m/Y",strtotime($reservas['dataReserva']));?><br/>	
			Horário: <?php echo $reservas['horario'] ;?> <br/>

		<form method="POST">
			<div class="form-group col-md-2" style="display: none">
						<label for="status">Confirmar Reserva: </label>
						<select name="status" class=form-control>
							<option value="1">SIM</option>
						</select>	
					</div>
			<input type="submit" value="Confirmar Reserva" class="btn btn-success">
		</form>
<?php endforeach; ?>	


	</div>
</div>