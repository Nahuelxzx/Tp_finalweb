<!DOCTYPE html>
<html lang="en">
<head>
	<title> Airlines.com </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all">
	<script type="text/javascript" src="js/cufon-yui.js"></script>
	<script type="text/javascript" src="js/cufon-replace.js"></script> 
	<script type="text/javascript" src="js/Myriad_Pro_italic_600.font.js"></script>
	<script type="text/javascript" src="js/Myriad_Pro_italic_400.font.js"></script>
	<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/Script.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
</head>
<body id="page5">
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<h1>
					<a href="index.php" id="logo">Air Lines</a><span id="slogan">el Mundo a tu alcance</span>
				</h1>
				<div class="right">
					<nav>
						<ul id="top_nav">
							<li><a href="index.php"><img src="images/img1.gif" alt=""></a></li>
							<li><a href="index-4.php"><img src="images/img2.gif" alt=""></a></li>
							<li class="bg_none"><a href="#"><img src="images/img3.gif" alt=""></a></li>
						</ul>
					</nav>
					<nav>
						<ul id="menu">
							<li><a href="index.php">Home</a></li>
							<li id="menu_active"><a href="index-pago.php"> Pago </a></li>
							<li><a href="index-3.php">Check - in</a></li>
							<li><a href="index-4.php">Contacto</a></li>
							<li id="redes"><a href=""><img src="images/img4.png"></a></li>
							<li><a href=""><img src="images/img5.png"></a></li>
							<li><a href=""><img src="images/img6.png"></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
	</div>
</div>
<div class="main">
	<div id="banner">
		<div class="text1">
			COMFORT<span>Garantizado</span><p>Buscamos ofrecerte la mejor atención desde que compras tu pasaje hasta que abandonas el avion, con una interesante oferta de productos Duty Free y con salones VIP.</p>
		</div>
	</div>
</div>
<!-- / header -->
<div class="main">
<!-- content -->
	<section id="content">
		<article class="col1">
			<div class="pad_1">
				<h2>Contact Us</h2>
				<span class="cols">
					Pais:<br>
					Provincia:<br>
					Telefono:<br>
					Email:
				</span>
				Argentina<br>
				Buenos Aires<br>
				(011) 4635621<br>
				<a href="mailto:">consultas@airlines.com</a>
				<h2>Mas Informacion</h2>
				<p> Airlines ofrece vuelos a los destinos más lindos del continente americano, dándoles a todos los viajeros la posibilidad de descubrir todos sus encantos.</p>
			</div>
		</article>
		<article class="col2 pad_left1">
			<h2>Gracias por volar con nosotros</h2>
			<form id="PagoForm" action="index-2a.php" method="POST">
				<div class="marker">
					<p class="pad_bot2"><strong> Sus datos fueron recibidos con exito.. </strong></p>
					<p class="pad_bot2"> Ya se encuentra a du disposicion un pdf con sus datos y el codigo de reserva correspondiete a su vuelo.</p>
					<p class="pad_bot2"></p>

					<?php
					session_start();

					$conexion = mysql_connect("localhost","root","") or die("Problemas en la conexion");
					mysql_select_db("tp_finalweb2",$conexion) or die("Problemas en la selección de la base de datos");

					$apellido = $_SESSION['apellido'];

					$codigo_reserva = $_SESSION['codigo_reserva'];

					if (isset($_POST['nomTit']))
						$nomTit = $_POST['nomTit'];
					if (isset($_POST['cuotas']))
						$cuotas = $_POST['cuotas'];
					if (isset($_POST['tarjeta']))
						$tarjeta = $_POST['tarjeta'];
					if (isset($_POST['numTarj']))
						$numTarj = $_POST['numTarj'];
					if (isset($_POST['anioVenc']) && isset($_POST['mesVenc']))
						$vence = "20".$_POST['anioVenc']."-".$_POST['mesVenc']."-01";
					if (isset($_POST['tipodniTit']))
						$tdniTit = $_POST['tipodniTit'];
					if (isset($_POST['numdniTit']))
						$dninumTit = $_POST['numdniTit'];
					if (isset($_POST['email']))
						$email = $_POST['email'];	

					$Consulta = mysql_query(" SELECT idPasajero
										   FROM pasaje 
										   WHERE claveAuto = '".$codigo_reserva."'  ", $conexion) or die("Problemas en el select:".mysql_error());
					
					while ($reg = mysql_fetch_array($Consulta)) {
						$id_pasajero = $reg['idPasajero'];						
					}

					$registros=mysql_query(" UPDATE pasajero 
										SET Nro_Tarjeta = '".$numTarj."', 
											Nombre_Titular = '".$nomTit."', 
											Tipo_Tarjeta = '".$tarjeta."', 
											Vencimiento = '".$vence."', 
											Nro_Doc_Titular = '".$dninumTit."', 
											Tipo_Doc_Titular = '".$tdniTit."' 
										WHERE idPasajero = ".$id_pasajero, 
			        $conexion) or die("Problemas en el select:".mysql_error());

			        $clave = $_SESSION['codigo_reserva'];

			        $registros=mysql_query(" UPDATE pasaje 
										SET habilitado = 'pago'
										WHERE claveAuto = ".$clave, $conexion) or die("Problemas en el select:".mysql_error());
					?>
				</div>
				<a href="pdfqr/examples/pasaje.php" class="button2" onClick="document.getElementById('ContactForm').submit()">Ver Pdf</a>
				<div class="clr"></div><br><br>
				<p class="color1">Le recordamos que usted se encontrara habilitado para hacer el check-in en el rango de 48hs a 24hs anteriores al vuelo.. </p>
				<br><div class="clr"></div>
			</form>

		</article>
	</section>
<!-- / content -->
</div>
<div class="body2">
	<div class="main">
<!-- footer -->
		<footer>
			Trabajo Practico Integrador - Programacion Web II - UNLaM <br>
			<span id="pie">Velasco, Romina Giselle · Zerpa, Nadia Lorena · Zurdo, Nahuel Matias</span>
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>

