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
							<li id="menu_active"><a href="index.php">Home</a></li>
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
					<p class="pad_bot2">
					<?php
					function generar_clave($longitud){ 
				       $cadena="[^A-Z0-9]"; 
				       return substr(eregi_replace($cadena, "", md5(rand())) . 
				       eregi_replace($cadena, "", md5(rand())) . 
				       eregi_replace($cadena, "", md5(rand())), 
				       0, $longitud); 
					} 
					//Ejemplo de utilización para una clave de 10 caracteres: 
					?>
					</p>
				</div>
				<a href="index-2b.php" class="button2" onClick="document.getElementById('ContactForm').submit()">Ver Pdf</a>
				<div class="clr"></div><br><br>
				<p class="color1">Le recordamos que usted se encontrara habilitado para hacer el check-in en el rango de 48hs a 24hs anteriores al vuelo.. </p>
				<?php
					session_start();

					require_once "Conexion/estructuraConsulta.php";

					$Consulta3 = new estructuraModelo();
					$Consulta4 = new estructuraModelo();

					$nomTit = $_POST['nomTit'];
					$cuotas = $_POST['cuotas'];
					$tarjeta = $_POST['tarjeta'];
					$numTarj = $_POST['numTarj'];
					$vence = "20".$_POST['anioVenc']."-".$_POST['mesVenc']."-01";
					$tdniTit = $_POST['tipodniTit'];
					$dninumTit = $_POST['numdniTit'];
					$email = $_POST['email'];					
					
					$id = 3;

					for ($i= 1; $i <= $_SESSION['adultos'] ; $i++){
						$apAdul = $_POST['appAdul'.$i];
						$nomAdul = $_POST['nomAdul'.$i];
						$sexAdul = $_POST['sexAdul'.$i];
						$fnacAdul = $_POST['anioAd'.$i]."-".$_POST['mesAd'.$i]."-".$_POST['diaAd'.$i];
						$tdniAdul = $_POST['tipodniAdul'.$i];
						$dninumAdul = $_POST['dninumAdul'.$i];
					
						//$Consulta3->get_sql_in("INSERT INTO pasajero (Nombre, Apellido, Tipo_doc, Dni, Fec_Nac, Email, Nro_Tarjeta, Nombre_Titular, Tipo_Tarjeta, Vencimiento, Nro_Doc_Titular, Tipo_Doc_Titular) VALUES ('".$nomAdul."', '".$apAdul."' , '".$tdniAdul."' , '".$dninumAdul."' , '".$fnacAdul."', '".$email."','".$numTarj."','".$nomTit."','".$tarjeta."','".$vence."','".$dninumTit."','".$tdniTit."' )");						
						$Consulta3->get_sql_in("INSERT INTO pasajero (Nombre, Apellido) VALUES ('".$nomAdul."', '".$apAdul."');");
						//$Consulta3->get_sql_in("insert into pasajero (nombre,apellido) values ($nomAdul, $apAdul);");

						$Consulta3->get_sql_in("insert into pasajero (nombre,apellido,dni) values ('" . $nomAdul . "','" . $apAdul . "'," . $dninumAdul . " );");						
						//$pasajero_consulta = $Consulta4->get_sql("SELECT idPasajero FROM pasajero WHERE Nombre = '".$nomAdul."', Apellido = '".$apAdul."', dni = '".$dninumAdul."' ");
						$pasajero_consulta = $Consulta4->get_sql("SELECT idPasajero FROM pasajero WHERE dni = '".$dninumAdul."' ");

						echo "pasajero_consulta : ()\n" . $dninumAdul;
						var_dump($pasajero_consulta);

						$id_pasajero = 32;
						
						foreach ($pasajero_consulta as $row){
							$id_pasajero = $row['idPasajero'];
							echo "id_pasajero".$id_pasajero."<br>";
						}

						

						$var1 = $_SESSION['origen'];
						$var2 = $_SESSION['destino'];
						echo "origen".$var1."<br>";
						echo "destino".$var2."<br>";
						$categoria = $_SESSION['clase'];
						
						/*$tarifa_nro = $Consulta3->get_sql('SELECT TA.NroTarifa as NroTarifa, TA.Precio_Economy as PrecioEconomico , TA.Precio_Primary as Precio_Primary from vuelo V1 inner join aeropuerto A1
						on V1.Aepto_Origen = A1.idAepto inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto inner join tarifa TA on V1.Aepto_Destino = TA.Aepto_Destino and V1.Aepto_Origen = TA.Aepto_Origen	where A1.Ciudad = "' . $var1 . '" and A2.Ciudad = "' . $var2 . '" ');
										
						foreach ($tarifa_nro as $row){
							$nro_tarifa = $row['NroTarifa'];
							echo "nro_tarifa".$nro_tarifa."<br>";

							if ($categoria == "primera"){
								$tarifa = $row['Precio_Primary'];
								echo "tarifa".$tarifa."<br>";
							}else {
								$tarifa = $row['PrecioEconomico'];
								echo "tarifa".$tarifa."<br>";
							}			
						}*/	 $nro_tarifa = 1;

						$nroVueloIda = $_SESSION['vuelo_ida'];
						echo "nroVuelo".$nroVueloIda."<br>";

						$codigo = generar_clave(6);
						echo "codigo".$codigo."<br>";

					}//borrar esta llave!
					
				/*	
					$carga_pasaje = $Consulta3->get_sql_in("INSERT INTO pasaje (idPasaje, nroVuelo, idPasajero, NroTarifa, categoria, claveAuto ) 
						VALUES ('".$id."','".$nroVueloIda."', '".$id_pasajero."' , '".$nro_tarifa."', '".$categoria."', '".$codigo."' )");
						$id++;
					}

					// MENORES!! //

					for ($i= 1; $i <= $_SESSION['menores'] ; $i++){
						$apMen = $_POST['appMen'.$i];
						$nomMen = $_POST['nomMen'.$i];
						$sexMen = $_POST['sexMen'.$i];
						$fnacMen = $_POST['anioMen'.$i]."-".$_POST['mesMen'.$i]."-".$_POST['diaMen'.$i];
						$tdniMen = $_POST['tipodniMen'.$i];
						$dninumMen = $_POST['dninumMen'.$i];

						$diasvuelos1 = $Consulta3->get_sql_in("INSERT INTO pasajero (Nombre, Apellido, Tipo_doc, Dni, Fec_Nac, Email, Nro_Tarjeta, Nombre_Titular, Tipo_Tarjeta, Vencimiento, Nro_Doc_Titular, Tipo_Doc_Titular) 
						VALUES ('".$nomMen."','".$apMen."','".$tdniMen."','".$dninumMen."','".$fnacMen."', '".$email."','".$numTarj."','".$nomTit."','".$tarjeta."','".$vence."','".$dninumTit."','".$tdniTit."')");

						$Consulta3->close();
					}
				*/	
				?>
				<div class="clr"></div>
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