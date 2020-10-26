<?php
define('BASE_URL', 'http://localhost/curacao_php/');
?>

<html>
    <head>
	<title>Curacao</title>

	<!-- BOOTSTRAP STYLES -->
	<!-- <link rel="stylesheet" href="static/bootstrap/css/bootstrap.min.css"> -->
	<meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<!-- JQUERY -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    </head>

    <body>
	 <nav class="navbar navbar-expand-lg navbar-light bg-light">
	 <a class="navbar-brand" href="#">
	    <!-- <img src="http://localhost/curacao_php/static/assets/images/logo_curacao.png" alt=""> -->
	    <img src="<?= BASE_URL.'static/assets/images/logo_curacao.png'?>" alt="">
	 </a>
	 <?php if(isset($_SESSION['logged']) && $_SESSION['logged']):  ?>
	     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		 <span class="navbar-toggler-icon"></span>
	     </button>
	     <div class="collapse navbar-collapse" id="navbarNav">
		 <ul class="navbar-nav">
		     <li class="nav-item">
			 <a class="nav-link" href="<?= BASE_URL.'solicitar-servicio'?>">Solicitar servicio</a>
		     </li>
		     <li class="nav-item">
			 <a class="nav-link" href="<?= BASE_URL.'historial'?>">Historial</a>
		     </li>
		    <?php if(isset($_SESSION['access_level']) && $_SESSION['access_level'] >= 3): ?>
		     <li class="nav-item">
			 <a class="nav-link" href="<?= BASE_URL.'signup/index.php'?>">Registrar usuario</a>
		     </li>
		     <?php endif; ?>
		     <li class="nav-item">
			 <a class="nav-link" href="<?= BASE_URL.'logout.php'?>">Cerrar sesión</a>
		     </li>
		 </ul>
	     </div>
	     <?php endif; ?>
	 </nav>   

    <div class="container p-4">
