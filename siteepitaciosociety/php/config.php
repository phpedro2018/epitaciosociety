<?php 

session_start(); 
global $pdo;

try {
	$pdo = new PDO("mysql:dbname=projeto_society; host=localhost; charset=utf8", "root", "root");
} catch (PFOException $e) {
	echo "Erro...".$e->getMessage();
	exit;
}

require_once ("classes/horario.class.php"); 
require_once ("classes/campo.class.php");
require_once ("classes/reserva.class.php");



?>