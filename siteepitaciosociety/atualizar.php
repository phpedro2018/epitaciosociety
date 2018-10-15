<?php 
include 'php/head.php';
require_once("php/config.php"); 

	if(empty($_SESSION['admLogin'])){?>
		<script type="text/javascript">window.location.href="login.php";</script>
	<?php
		exit;
	}

	$updateReserva = new Reservas; 
		
		if(isset($_POST['nome']) && !empty($_POST['nome'])){ //CAMPO NOME COMO REFERENCIA
		$data = addslashes(date('Y-d-m', strtotime($_POST['data']))); //ADICIONANDO DATA 
		$campo = addslashes($_POST['campo']); //ADICIONANDO CAMPO
		$horario = addslashes($_POST['horario']); //ADICIONANDO HORARIO
		$nome = addslashes($_POST['nome']); //ADICIONANDO NOME DO LOCATÁRIO DA CAMPO
		$celular = addslashes($_POST['celular']); //CONTATO DO LOCATÁRIO
		$updateReserva->atualizarReserva($data, $campo, $horario, $nome, $celular, $_GET['idReserva']);
		?>
		<div class="alert alert-success">
			Atualizado com Sucesso
			<script type="text/javascript">window.location.href="paineladm.php",10000;</script>
		</div>
		<?php 
	}


if(isset($_GET['idReserva']) && !empty($_GET['idReserva'])) {
	$idReserva = addslashes($_GET['idReserva']);
} else {
?>
	<script type="text/javascript">window.location.href="paineladm.php",10000;</script>
<?php
	exit;
}
			
?>




<script>
   $( function() {
    $( "#data" ).datepicker(
                            {
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
});
  } );
</script>
<div class="container">
	<img src="imagens/logo1.png" alt="" class="rounded mx-auto d-block" width="200" height="200">
			
			<h2>Atualizar Reserva</h2>
			<?php 

			$sqlReservas  = $updateReserva->getReservas($idReserva);
				foreach($sqlReservas as $reservas):
			?>
			
			<form  method="POST">
				<div class="form-row">
							
					<div class="form-group col-md-8">
				      <label for="nome">Nome:</label>
				       <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $reservas['nome'];?>" required>
				    </div>
				
					<div class="form-group col-md-4">
				      <label for="ceular">Celular:</label>
				       <input type="text" name="celular" id="celular" class="form-control" value="<?php echo $reservas['celular'];?>" required>
				    </div>
				</div>

				 <div class="form-row">
		    
				    <div class="form-group col-md-3">
				      <label for="data">Escolha a data</label>
				       <input type="text" name="data" id="data" class="form-control"  required>
				    </div>

				    <div class="form-group col-md-2">
				    	<label for="campo">Escolha o Campo</label>
				     	<select name="campo" class="form-control">
							<option value="1"> Campo 01 </option>
							<option value="2"> Campo 02 </option>
							<option value="3"> Campo 03 </option>
						</select>
				     </div> 
					
					<div class="form-group col-md-2">
						<label for="horarios">Horário</label>
						<select name="horario" class="form-control">
							<option value="1"> 	06:00 - 07:00 </option>
							<option value="2"> 	07:00 - 08:00 </option>
							<option value="3"> 	08:00 - 09:00 </option>					
							<option value="4"> 	16:00 - 17:00 </option>
							<option value="5">  17:00 - 18:00 </option>
							<option value="6"> 	18:00 - 19:00 </option>
							<option value="7"> 	19:00 - 20:00 </option>
							<option value="8"> 	20:00 - 21:00 </option>
							<option value="9"> 	21:00 - 22:00 </option>
							<option value="10">	22:00 - 23:00 </option>
							<option value="11"> 23:00 - 00:00 </option>
							<option value="12"> 00:00 - 11:00 </option>
						</select>
					</div>
					
					<div class="form-group col-md-2" style="display: none">
						<label for="confirma">Confirmar Reserva: </label>
						<select name="confirma" class=form-control>
							<option value="0">NÃO</option>
						</select>	
					</div>

					<div class=" form-group col-md-1"> <br/>
						<label></label>
						<input type="submit" value="Atualizar" class="btn btn-success">			
					</div>

				</div>
		</form>
	
		<?php endforeach; ?>
</div>