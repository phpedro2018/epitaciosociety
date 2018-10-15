<?php 

	class Campo{

		
		public function getCampo(){
			global $pdo; 
			$array = array(); 
			$sql = $pdo->prepare("SELECT * FROM campo"); 
			$sql->execute(); 

			if($sql->rowCount() > 0 ){
				$array = $sql->fetchAll();
			} 

			return $array; 
		}
		

		public function getCampo01(){
			global $pdo; 
			$array = array(); 
			$sql = $pdo->prepare("SELECT * FROM campo WHERE idcampo = 1"); 
			$sql->execute(); 

			if($sql->rowCount() > 0 ){
				$array = $sql->fetchAll();
			} 

			return $array; 
		}


		public function getCampo02(){
			global $pdo; 
			$array = array(); 
			$sql = $pdo->prepare("SELECT * FROM campo WHERE idCampo = 2"); 
			$sql->execute();

			if($sql->rowCount() > 0 ){
				$array = $sql->fetchAll();
			} 

			return $array; 
		}


		public function getCampo03(){
			global $pdo; 
			$array = array(); 
			$sql = $pdo->prepare("SELECT * FROM campo WHERE idCampo = 3"); 
			$sql->execute();

			if($sql->rowCount() > 0 ){
				$array = $sql->fetchAll();
			} 

			return $array; 
		}
	}


?>