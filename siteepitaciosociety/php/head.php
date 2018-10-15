<?php require_once("config.php"); ?>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="imagens/favicon48.png" sizes="56x56" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
    	<meta name="author" content="">
	<title> Epitácio Society</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.mask.js"></script>
	<script src="js/script.js"></script>
</head>

<nav class="navbar navbar-expand-md navbar-dark bg-dark" >
  <div class="container">
	  <a class="navbar-brand" href="./"><img src="imagens/logo2.png" alt="" width="30" height="35"> Epitácio Society</a>
	
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    	<span class="navbar-toggler-icon"></span>
  		</button>

	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
	    
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="sobre.php">Sobre</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="horarios.php" >Horários</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="pacotes_e_valores.php">Pacotes e Valores</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="contatos.php">Contatos</a>
	      </li>
	    </ul>

	    <ul class="navbar-nav ml-auto">
	    	<?php if(isset($_SESSION['admLogin']) && !empty($_SESSION['admLogin'])): ?>
	    	<li class="nav-item">
	    	<a class="nav-link "  href="adm.php">Menu do Administrador</a>
	    	</li>
	    	<li class="nav-item">
	    	<a class="nav-link "  href="logout.php"><img src="imagens/png/account-logout-3x.png" width="20" height="20" > Sair</a>
	    	</li>

	    <?php else: ?>
	    	<li class="nav-item">
	    	<a class="nav-link "  href="login.php"><img src="imagens/png/account-login-3x.png" width="20" height="20"> Login</a>
	    	</li>
	    <?php endif; ?>
	    </ul>

	  </div> 
	  </div> 
</nav>
