<?php 
require_once("php/config.php");





$post = new Reservas();

if(isset($_GET['idReserva']) && !empty($_GET['idReserva'])){
	$post->excluirReserva($_GET['idReserva']);
}

header("Location: paineladm.php");

?>