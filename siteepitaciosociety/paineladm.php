<?php 
require_once ("php/config.php");
include 'php/head.php';

if(empty($_SESSION['admLogin'])){
	?>
	<script type="text/javascript">window.location.href="login.php";</script>
	<?php
	exit;
}
$dataAtual = date('Y-m-d');
$campo = new Campo;
$sqlCampos = $campo->getCampo();
?>
<style>
    table{text-align:center;}
</style>



<div class="container">


	
		<h2 style="text-align: center;">Painel do Administrador</h2>
	<div class="jumbotron jumbotron-fluid">	
		<h3 style="text-align: center">Reservas de Hoje: <?php echo date('d/m/Y'); ?></h3>
	</div>	
		<h4>Para ver todas as reservas digite 01</h4>
	
	<div class="form-inline">
		<form methos="GET">
		Buscar: 
		<input type="text" name="busca" id="" class="form-control" placeholder="Nome, Data ou Campo" value="<?php echo(!empty($_GET['busca']))?$_GET['busca']:''; ?>"> 
		<input type="submit" value="Buscar" class="btn btn-success">
		<a href="paineladm.php" class="btn btn-danger">Resetar</a>
	</form>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
		<div class="table-responsive">	
		<table class="table table-striped">
		<thead>
			<tr>
				<th>Nº</th>
				<th>Data</th>
				<th>Nome</th>
				<th>Telefone</th>
				<th>Campo</th>
				<th>Horário</th>
				<th colspan="2" >Ações</th>
				<th>Status</th>
				
			</tr>
		</thead>
		<tbody>

			<?php 
			
			$reserva = new Reservas; 
			$sqlReservas  = $reserva->getBusca();
			foreach($sqlReservas as $reservas){
			?>
			<?php if($reservas['status'] == 1){?>
			<tr style="background-color: #f2f2f2; color:#000">
			<?php }else{ ?>
			<tr style="background-color: #fff000">
			<?php } ?>	
				<td> <?php echo $reservas['idReserva']; ?> </td>
				<td> <?php echo date("d/m/Y", strtotime($reservas['dataReserva']));?> </td>
				<td> <?php echo $reservas['nome']; ?> </td>
				<td> <?php echo $reservas['celular']; ?> </td>
				<td> <?php echo $reservas['campoReservado']; ?> </td>
				<td> <?php echo str_replace("-"," ", $reservas['horario']); ?> </td>
				<td> <a href=<?php echo "excluir_reserva.php?idReserva=".$reservas['idReserva']; ?> class="btn btn-danger btn-sm"> Excluir</td>
				<td> <a href=<?php echo "atualizar.php?idReserva=".$reservas['idReserva']; ?> class="btn btn-success btn-sm "> Atualizar</td>
					<?php if($reservas['status'] == 0){ ?>	
				<td> 
					<a href=<?php echo "confirmar_reserva.php?idReserva=".$reservas['idReserva']; ?> class="btn btn-secondary btn-sm"> Confirmar</td>
				<?php }else{ ?>
				<td> 
					<a href="#" class="btn btn-info btn-sm disabled">confirmado</td>
					<?php } ?>	
			</tr>
			<?php 
				}
			?>
		</tbody>
	</table>
</a>
</td>
</a>
</td>
</a>
</td>
</a>
</td>
</tr>
</tr>
</tbody>
</table>
</div>
	</div>
</div>


