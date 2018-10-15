<?php 
	class Horarios{
		public function getHorarios(){
			global $pdo;
			$array = array();
			

			$sqlHorarios = $pdo->prepare("SELECT * FROM horarios "); 
			$sqlHorarios->execute(); 

			if($sqlHorarios->rowCount() > 0){
				$array = $sqlHorarios->fetchAll();
			}

			return $array;

			
		}
	}	
	
?>