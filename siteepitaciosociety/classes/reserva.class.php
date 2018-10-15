<?php 

	
	class Reservas{

		

		public function reservar($data, $campo, $horario, $nome, $celular, $status){

			global $pdo;

			$sql = $pdo->prepare("INSERT INTO reserva SET
				dataReserva = :data,
				idCampo = :campo, 
				idHorario = :horario, 
				nome = :nome, 
				celular = :celular,
				status = :confirma");
			
			$sql->bindValue(":data", $data);
			$sql->bindValue(":campo", $campo);
			$sql->bindValue(":horario", $horario);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":celular", $celular);
			$sql->bindValue(":confirma", $status);
			$sql->execute();
		}

		public function confirmarReserva($status, $idReserva){
			global $pdo;

			$sql = $pdo->prepare("UPDATE reserva SET
				status = :status WHERE idReserva = :idReserva");
			
			
			$sql->bindValue(":status", $status);
			$sql->bindValue(":idReserva", $idReserva);
			$sql->execute();
		}


		public function atualizarReserva($data, $campo, $horario, $nome, $celular, $id){

			global $pdo; 

			$sql = $pdo->prepare("UPDATE reserva SET
				dataReserva = :data,
				idCampo = :campo, 
				idHorario = :horario, 
				nome = :nome, 
				celular = :celular WHERE id = :id");
			
			$sql->bindValue(":data", $data);
			$sql->bindValue(":campo", $campo);
			$sql->bindValue(":horario", $horario);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":celular", $celular);
			$sql->bindValue(":id", $id);
			$sql->execute();

		}

		public function getReservas($idReserva){

				$array = array();
				global $pdo;
				$sql = $pdo->prepare("SELECT 
					a.idReserva, 
					a.dataReserva, 
					a.nome, 
					a.celular,
					a.status,
					b.campoReservado,
					c.horario
					FROM reserva a
					INNER JOIN campo b ON b.idCampo = a.idCampo
					INNER JOIN horarios c ON c.idHorario = a.idHorario WHERE idReserva = :idReserva");
				$sql->bindValue(":idReserva",$idReserva);
					
			$sql->execute();
			

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			} 

			return $array;
		}

	


		public function getBusca(){

			global $pdo;
			$dataAtual = date('Y-m-d');			

			if(isset($_GET['busca']) && !empty($_GET['busca'])) {

				$busca = $_GET['busca'];
				$array = array(); 
				$sql  = $pdo->prepare("SELECT 
					a.idReserva, 
					a.dataReserva, 
					a.nome, 
					a.celular,
					b.campoReservado,
					c.horario,
					a.status
					FROM reserva a
					INNER JOIN campo b ON b.idCampo = a.idCampo
					INNER JOIN horarios c ON c.idHorario = a.idHorario WHERE  nome LIKE :nome OR dataReserva LIKE :data ORDER BY b.idCampo ASC");

					$sql->bindValue(":nome", '%'.$busca.'%');
					$sql->bindValue(":data", '%'.$busca.'%');
					$sql->execute();
			}  else {

				$array = array();
				$sql = $pdo->prepare("SELECT 
					a.idReserva, 
					a.dataReserva, 
					a.nome, 
					a.celular,
					b.campoReservado,
					c.horario,
					a.status
					FROM reserva a
					INNER JOIN campo b ON b.idCampo = a.idCampo
					INNER JOIN horarios c ON c.idHorario = a.idHorario WHERE  '$dataAtual' = a.dataReserva ORDER BY a.idReserva ASC");

					$sql->execute();
			} 

			if($sql->rowCount() > 0){
				$array = $sql->fetchAll();
			} 

			return $array;
		}




		public function getGrade01($idHorario){

            global $pdo;
            $idCampo = 1;
            $status = 1;
            
                if(isset($_GET['verReservas']) && !empty($_GET['verReservas'])) {
		            $array = array(); 
	                $sql  = $pdo->prepare("SELECT * FROM reserva 
	                	WHERE 
	                	idHorario = :idHorario && 
	                	dataReserva = :dataReserva &&
	                	idCampo = :idCampo && 
	                	status = :status ");
                    $sql->bindValue(":dataReserva", $_GET['verReservas'],PDO::PARAM_STR);  
                    $sql->bindValue(":idHorario", $idHorario,PDO::PARAM_STR);    
                    $sql->bindValue(":idCampo", $idCampo ,PDO::PARAM_STR); 
                    $sql->bindValue(":status", $status, PDO::PARAM_STR);
                    $sql->execute();
            }  else {
                $dataAtual = date('Y-m-d');
                $array = array();
                $sql = $pdo->prepare("SELECT 
                    a.dataReserva,
                    a.status, 
                    b.idcampo,
                    c.idHorario
                    FROM reserva a
                    INNER JOIN campo b ON b.idcampo = 1
                    INNER JOIN horarios c ON c.idHorario = a.idHorario ");
                    $sql->bindValue(":a.dataReserva", $dataAtual);  
                    $sql->execute();
            } 
	        return $sql;
        }


        public function getGrade02($idHorario){

            global $pdo;
            $idCampo = 2;
            $status = 1;
                if(isset($_GET['verReservas']) && !empty($_GET['verReservas'])) {
		            $array = array(); 
	                $sql  = $pdo->prepare("SELECT * FROM reserva WHERE idHorario = :idHorario && dataReserva = :dataReserva && idCampo = :idCampo && status = :status");
                    $sql->bindValue(":dataReserva", $_GET['verReservas'],PDO::PARAM_STR);  
                    $sql->bindValue(":idHorario", $idHorario,PDO::PARAM_STR);    
                    $sql->bindValue(":idCampo", $idCampo ,PDO::PARAM_STR); 
                    $sql->bindValue(":status", $status, PDO::PARAM_STR);
                    $sql->execute();
            }  else {
                $dataAtual = date('Y-m-d');
                $array = array();
                $sql = $pdo->prepare("SELECT 
                    a.dataReserva,
                    a.status, 
                    b.idcampo,
                    c.idHorario
                    FROM reserva a
                    INNER JOIN campo b ON b.idcampo = 2
                    INNER JOIN horarios c ON c.idHorario = a.idHorario ");
                    $sql->bindValue(":a.dataReserva", $dataAtual);  
                    $sql->execute();
            } 
	        return $sql;
        }

        public function getGrade03($idHorario){

            global $pdo;
            $idCampo = 3;
            $status = 1;
                if(isset($_GET['verReservas']) && !empty($_GET['verReservas'])) {
		            $array = array(); 
	                $sql  = $pdo->prepare("SELECT * FROM reserva WHERE idHorario = :idHorario && dataReserva = :dataReserva && idCampo = :idCampo && status = :status");
                    $sql->bindValue(":dataReserva", $_GET['verReservas'],PDO::PARAM_STR);  
                    $sql->bindValue(":idHorario", $idHorario,PDO::PARAM_STR);    
                    $sql->bindValue(":idCampo", $idCampo ,PDO::PARAM_STR);
                    $sql->bindValue(":status", $status, PDO::PARAM_STR); 
                    $sql->execute();
            }  else {
                $dataAtual = date('Y-m-d');
                $array = array();
                $sql = $pdo->prepare("SELECT 
                    a.dataReserva, 
                    a.status,
                    b.idcampo,
                    c.idHorario
                    FROM reserva a
                    INNER JOIN campo b ON b.idcampo = 3
                    INNER JOIN horarios c ON c.idHorario = a.idHorario ");
                    $sql->bindValue(":a.dataReserva", $dataAtual);  
                    $sql->execute();
            } 
	        return $sql;
        }



        public function excluirReserva($idReserva){
        	global $pdo; 

        	$sql = $pdo->prepare("DELETE FROM reserva WHERE idReserva = :idReserva"); 
        	$sql->bindValue(":idReserva", $idReserva); 
        	$sql->execute();
        }



        public function verificarDisponibilidade($data, $campo, $horario){

        global $pdo;

		$sql = $pdo->prepare(
			"SELECT * FROM reserva")	;
				
		
		$sql->execute(); 

		if($sql->rowCount() > 0 ) {
			return false; 
		} else {
			return true; 
		}
	

	}





}
		

?>