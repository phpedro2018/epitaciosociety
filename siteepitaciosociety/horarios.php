<?php 
require_once("php/config.php"); 
include 'php/head.php';
?>

<style>
    table{text-align:center;}
    a{margin-left:2px;}
    td a{color:#fff;}
    td a:hover{text-decoration:none;color:yellow;}
</style>
<script>
   $( function() {
    $( "#data" ).datepicker({
    dateFormat: 'dd-mm-yy',
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

<!--###################   LINHA QUE DIVIDE O FORMULÁRIO DE CADASTRO DA PÁGINA DE GRADE DOS HORÁRIOS ###########################-->


<!--##############################################################  INICIO  grade dos horários do campo 01 #######################################-->			
	<div class="container">
        <div class="row">
            <div class="col-sm-12">
            <?php 
                if(empty($_GET['verReservas'])) {
                    $_GET['verReservas'] = date('Y-m-d'); 
                } else {
                    $_GET['verReservas'] = date('Y-m-d', strtotime($_GET['verReservas']));
            }



            
            ?>
            <br/>
            <div class="jumbotron jumbotron-fluid">
            <h3 style="text-align: center">
                Reservas do dia : <?php echo "<strong>".date("d/m/Y", strtotime($_GET['verReservas']))."</strong>" ;?>
            </h3>
             <p>
                *Clique no campo em branco <br/>
                **Selecione a data que deseja consultar <br/>
                ***Clique no botão verde VERIFICAR
            </p>
                
            </div>
                <div class="form-inline">
                <form method="GET">
                    <div class="form-group mb-4">
                        <label>Ver Reservas para data: </label>
                        <input type="text" name="verReservas" id="data"  class="form-control"  required>
                        <input type="submit" value="Verificar" class="btn btn-success" style="margin-left: 2px;">
                        <a href="horarios.php" class="btn btn-danger">Limpar</a>
                        <a href="reservar.php" class="btn btn-secondary"> RESERVAR CAMPO</a>
                    </div>
                </form>
                </div>
          
        </div>
	   
		
		<div class="col-sm-4">
		  <table class="table table-success">
                <thead>
                    <tr>
                        <th>Campo 01</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                         	$grade01 = new Campo();
                            $sqlGrade01 = $grade01->getCampo01();
                            foreach($sqlGrade01 as $grade001){}
                            
                            $horarios01 = new Horarios();
                            $sqlHorarios01 = $horarios01->getHorarios();
                            foreach($sqlHorarios01 as $horarios001){
                                                    
                            $reservas01 = new Reservas();
                            $sqlReservas01 = $reservas01->getGrade01($horarios001['idHorario']);
                           
                         ?>
                            <tr>
                            <?php
	                           if($sqlReservas01->rowCount() > 0 ){
	                              echo '<td style="background-color:red; color:#fff">';
                                  echo str_replace("-", " ", $horarios001['horario']);
	                            }else {
                                   echo '<td style="background-color:green; color:#fff">';

                                    echo '<a href="reservar.php?RESERVA=horario_'.$horarios001['idHorario']."_campo_".$grade001['idCampo']."_dia_".$_GET['verReservas'].'">'
                                        .str_replace("-", " ", $horarios001['horario'])
                                        .'</a>';
                                }
                               
                                ?>
                            </td>
                            </tr>
                          
                        <?php   }   ?>  
                </tbody>
            </table>
		</div>

		<div class="col-sm-4">
		<table class="table table-success">
                <thead>
                    <tr>
                        <th>Campo 02</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                         	$grade02 = new Campo();
                            $sqlGrade02 = $grade02->getCampo02();
                            foreach($sqlGrade02 as $grade002){}
                            
                            $horarios02 = new Horarios();
                            $sqlHorarios02 = $horarios02->getHorarios();
                            foreach($sqlHorarios02 as $horarios002){
                                                    
                            $reservas02 = new Reservas();
                            $sqlReservas02 = $reservas02->getGrade02($horarios002['idHorario']);
                           
                         ?>
                            <tr>
                            <?php
	                           if($sqlReservas02->rowCount() > 0 ){
	                              echo '<td style="background-color:red; color:#fff">';
                                  echo str_replace("-", " ", $horarios002['horario']);
	                            }else {
	                              echo '<td style="background-color:green; color:#fff">';
                                  echo '<a href="reservar.php?RESERVA=horario_'.$horarios002['idHorario']."_campo_".$grade002['idCampo']."_dia_".$_GET['verReservas'].'">'
                                        .str_replace("-", " ", $horarios002['horario'])
                                        .'</a>';
                                }
	                           ?>
                              
                            </td>
                            </tr>
                          
                        <?php   }   ?>  
                </tbody>
            </table>
		</div>

		<div class="col-sm-4">
		<table class="table table-success">
                <thead>
                    <tr>
                        <th>Campo 03</th>
                    </tr>
                </thead>
                <tbody>
                        <?php 
                         	$grade03 = new Campo();
                            $sqlGrade03 = $grade03->getCampo03();
                            foreach($sqlGrade03 as $grade003){}
                            
                            $horarios03 = new Horarios();
                            $sqlHorarios03 = $horarios03->getHorarios();
                            foreach($sqlHorarios03 as $horarios003){
                                                    
                            $reservas03 = new Reservas();
                            $sqlReservas03 = $reservas03->getGrade03($horarios003['idHorario']);
                           
                         ?>
                            <tr>
                            <?php
	                           if($sqlReservas03->rowCount() > 0 ){
	                              echo '<td style="background-color:red; color:#fff">';
                                  echo str_replace("-", " ", $horarios003['horario']);
	                            }else {
	                              echo '<td style="background-color:green; color:#fff">';
                                  echo '<a href="reservar.php?RESERVA=horario_'.$horarios003['idHorario']."_campo_".$grade003['idCampo']."_dia_".$_GET['verReservas'].'">'
                                        .str_replace("-", " ", $horarios003['horario'])
                                        .'</a>';
	                            }
	                            
	                            ?>
                            </td>
                            </tr>
                          
                        <?php   }   ?>  
                </tbody>
            </table>
		</div>
        </div>
	</div>





