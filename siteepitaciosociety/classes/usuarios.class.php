<?php 


class Usuarios{

	
	public function loginADM($usuario, $senha){
		global $pdo;

		$sql = $pdo->prepare("SELECT * FROM  adm WHERE usuario = :usuario AND senha = :senha");
		$sql->bindValue(":usuario", $usuario);
		$sql->bindValue(":senha", $senha);
		$sql->execute(); 

		if($sql->rowCount() > 0){
			$dados = $sql->fetch(); 
			$_SESSION['admLogin'] = $dados['id'];
			$_SESSION['admNome'] = $dados['usuario'];
			return true; 
		} else {
			return false;
		}
	}

}

?>