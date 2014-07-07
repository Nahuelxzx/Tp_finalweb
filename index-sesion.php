<!DOCTYPE html>
<html lang="en">
<head>
	<title> Airlines.com </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="all">
	<script type="text/javascript" src="jqueryButacas/ga.js"></script> <!-- script butaca-->
    <script type="text/javascript" src="jqueryButacas/jquery-1.4.1.min.js"></script> <!-- script butaca-->
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
	<style type="text/css">
        #holder1{height:410px; width:140px; background-color:#F5F5F5; border:1px solid #A4A4A4; margin-left:10px;padding-left: 10px; padding-right: 10px}
        #holder2{height:570px; width:240px; background-color:#F5F5F5; border:1px solid #A4A4A4; margin-left:10px;padding-left: 10px; padding-right: 10px}
        #holder3{height:850px; width:240px; background-color:#F5F5F5; border:1px solid #A4A4A4; margin-left:10px;padding-left: 10px; padding-right: 10px}
        #holder4{height:1210px; width:190px; background-color:#F5F5F5; border:1px solid #A4A4A4; margin-left:10px;padding-left: 10px; padding-right: 10px}
        #place {position:relative; margin:7px;}
        #place a{font-size:0.6em; text-decoration: none; color: black;}
        #place li{list-style: none outside none; position: absolute;}    
        #place li:hover{background-color: #fff;} 
        #place .seat{background:url("images/vacia.gif") no-repeat scroll 0 0 transparent;height:33px; width:33px; display:block;}
        #place .selectedSeat{background-image:url("images/ocupada.gif");}
        #place .selectingSeat{background-image:url("images/selec.gif");}
    </style>
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
			
			<?php
//LEVANTO LOS DATOS CON POST Y LLAMO A INICIO SESION DONDE COMPARO LOS DATOS//
//*************************************************************************//
if ( (isset($_POST['email'])) && (isset($_POST['password']) ))
	{
		require_once "Conexion/estructuraConsulta.php";		

		$nombre_ingresado = $_POST['email'];
		$password_ingresado = $_POST['password'];

		$consulta_Usuario = new estructuraModelo();
		$miUsuario = $consulta_Usuario->get_sql('Select nombre,password from administrador order by nombre');

		//Traer por post los valores introducidos en los campos de usuario y contraseña del Form(falta)
		foreach ($miUsuario as $row)
		{
			$usuario = $row['nombre'];
			$password = $row['password'];			
		}		

		if(($usuario == $nombre_ingresado) && ($password == $password_ingresado))
			{
				//Iniciamos las variables de sesion
				session_start();
				$ahora = date("Y-n-j H:i:s");
				$_SESSION["ultimoAcceso"] = $ahora;
				$_SESSION['nombre_usuario'] = $usuario;
				$_SESSION['password_usuario'] = $password;
				$fechaGuardada = $_SESSION["ultimoAcceso"]; 
				$ahora = date("Y-n-j H:i:s");
				echo "Bienvenido : " . $usuario . " Su ultimo ingreso fue : " . $_SESSION['ultimoAcceso'];
			}
		else{
				echo '<script>alert("Hola\n Su password o usuario son incorrectos por favor reingrese");</script>';
				header("Location: index.php");				
			}
	}
	?>

	</article>
	</section>
<!-- / content -->
</div>
<div class="body2">
	<div class="main">
<!-- footer -->
		<footer>
			Trabajo Practico Integrador - Programacion Web II - UNLaM <br>
			<span>Velasco, Romina Giselle · Zerpa, Nadia Lorena · Zurdo, Nahuel Matias</span>
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>