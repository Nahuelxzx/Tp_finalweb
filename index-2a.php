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
							<li><a href="index-pago.php"> Pago </a></li>
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
				<div class="marker">
				<p class="pad_bot2"><strong> Sus datos fueron recibidos con exito.. </strong></p>
				<p class="pad_bot2"></p>

			<?php
				session_start();

				$conexion = mysql_connect("localhost","root","") or die("Problemas en la conexion");
				mysql_select_db("tp_finalweb2",$conexion) or die("Problemas en la selección de la base de datos");
				
				$var1 = $_SESSION['origen'];
				$var2 = $_SESSION['destino'];
				$categoria = $_SESSION['clase'];
				$email = $_POST['email'];
				$varfechap = $_SESSION['fechap'];
				$varfechar = $_SESSION['fechar'];
				$nroVueloIda = $_SESSION['vuelo_ida'];
				$nroVueloVuelta = $_SESSION['vuelo_vuelta'];
				
				$fechap = date("Y-m-d",strtotime($varfechap));
				$fechar = date("Y-m-d",strtotime($varfechar));

				function generar_clave($longitud){ 
			       $cadena="[^A-Z0-9]"; 
			       return substr(eregi_replace($cadena, "", md5(rand())) . 
			       eregi_replace($cadena, "", md5(rand())) . 
			       eregi_replace($cadena, "", md5(rand())), 
			       0, $longitud); 
				} 
				// ADULTOS!! //s
				for ($i= 1; $i <= $_SESSION['adultos'] ; $i++) {
					$apAdul = $_POST['appAdul'.$i];
					$nomAdul = $_POST['nomAdul'.$i];
					$sexAdul = $_POST['sexAdul'.$i];
					$fnacAdul = $_POST['anioAd'.$i]."-".$_POST['mesAd'.$i]."-".$_POST['diaAd'.$i];
					$tdniAdul = $_POST['tipodniAdul'.$i];
					$dninumAdul = $_POST['dninumAdul'.$i];

					$Insert_registros = mysql_query("INSERT INTO pasajero (Nombre, Apellido, Tipo_doc, Dni, Fec_Nac, Email ) 
					VALUES ('".$nomAdul."', '".$apAdul."' , '".$tdniAdul."' , '".$dninumAdul."' , '".$fnacAdul."', '".$email."' )", 
				    $conexion) or die("Problemas en el select:".mysql_error());
					

					//VERIFICAR SI HAY LUGAR EN EL VUELO SELECCIONADO ******* COMIENZO ********
					$Cuenta=mysql_query(" SELECT COUNT(*) as Total
										FROM pasaje 
										WHERE nroVuelo = '".$nroVueloIda."'  ", $conexion) or die("Problemas en el select:".mysql_error());
					
					while ($reg = mysql_fetch_array($Cuenta)){
								$totalIda = $reg[0];//Cantidad de personas q viajan a la ida
						}

					$Consulta2 = mysql_query(" SELECT idAvion
											   FROM vuelo
											   WHERE idVuelo = '".$nroVueloIda."'  ", $conexion) or die("Problemas en el select:".mysql_error());
						
					while ($reg = mysql_fetch_array($Consulta2)) {
						$idAvionIda = $reg['idAvion'];	//id del avion que realiza el viaje de ida
						}

					$Consulta3 = mysql_query(" SELECT Economico, Primera, Tipo
											   FROM avion
											   WHERE idAvion = '".$idAvionIda."'  ", $conexion) or die("Problemas en el select:".mysql_error());
						
					while ($reg = mysql_fetch_array($Consulta3)) { //Datos de el avion..
						$Economico = $reg['Economico'];
						$Primera = $reg['Primera'];
						$TipoAvion = $reg['Tipo'];
					}

					$totalAsientosAvion = $Economico + $Primera;

					//VERIFICAR SI HAY LUGAR EN EL VUELO SELECCIONADO ******* FINAL ********

					if ($totalIda <= $totalAsientosAvion) {
					
						$Consulta_registros1=mysql_query(" SELECT idPasajero FROM pasajero WHERE dni = ".$dninumAdul."  ", 
                        $conexion) or die("Problemas en el select:".mysql_error());

						while ($reg = mysql_fetch_array($Consulta_registros1)){
							$id_pasajero = $reg['idPasajero'];						
						}

						$Consulta_registros2=mysql_query(" SELECT TA.idTarifa as NroTarifa, 
							                                      TA.Precio_Economy as PrecioEconomico , 
							                                      TA.Precio_Primary as Precio_Primary 
						                                   from vuelo V1 
						                                   inner join aeropuerto A1 on V1.Aepto_Origen = A1.idAepto 
						                                   inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto 
						                                   inner join tarifa as TA on V1.Aepto_Destino = TA.Aepto_Destino and V1.Aepto_Origen = TA.Aepto_Origen	
						                                   where A1.Ciudad = '".$var1."' 
						                                   and A2.Ciudad = '".$var2."'  ", $conexion) 
						                                   or die("Problemas en el select:".mysql_error());

						while ($reg = mysql_fetch_array($Consulta_registros2)) {
							$nro_tarifa = $reg['NroTarifa'];

							if ($categoria == "primera"){
								$tarifa = $reg['Precio_Primary'];
							}else {
								$tarifa = $reg['PrecioEconomico'];
							}
						}

						$codigo = generar_clave(6);
						echo "Pasajero Adulto ".$i.": ".$nomAdul." ".$apAdul."<br>";
						echo "Codigo de Reserva Ida: ".$codigo."<br>";
						//borrar cuando el circuito funcione!!1
						echo "Tipo de Avion: ".$TipoAvion;
						echo "<br>Cantidad de Asientos en el avion: ".$totalAsientosAvion;
						echo "<br>Cantidad de perosonas q viajaran: ".$totalIda."<br><br>";
					
						$registros = mysql_query(" INSERT INTO pasaje (nroVuelo, idPasajero, NroTarifa, categoria, claveAuto, tarifa, fecha_Salida, habilitado ) 
						VALUES ('".$nroVueloIda."', '".$id_pasajero."' , '".$nro_tarifa."', '".$categoria."', '".$codigo."', '".$tarifa."', '".$fechap."', 'si' ) ", 
                      	$conexion) or die("Problemas en el select:".mysql_error());

					}elseif ($totalIda <= ($totalAsientosAvion + 10)) {
						$Consulta_registros1=mysql_query(" SELECT idPasajero FROM pasajero WHERE dni = ".$dninumAdul."  ", 
                        $conexion) or die("Problemas en el select:".mysql_error());

						while ($reg = mysql_fetch_array($Consulta_registros1)){
							$id_pasajero = $reg['idPasajero'];						
						}

						$Consulta_registros2=mysql_query(" SELECT TA.idTarifa as NroTarifa, 
							                                      TA.Precio_Economy as PrecioEconomico , 
							                                      TA.Precio_Primary as Precio_Primary 
						                                   from vuelo V1 
						                                   inner join aeropuerto A1 on V1.Aepto_Origen = A1.idAepto 
						                                   inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto 
						                                   inner join tarifa as TA on V1.Aepto_Destino = TA.Aepto_Destino and V1.Aepto_Origen = TA.Aepto_Origen	
						                                   where A1.Ciudad = '".$var1."' 
						                                   and A2.Ciudad = '".$var2."'  ", $conexion) 
						                                   or die("Problemas en el select:".mysql_error());

						while ($reg = mysql_fetch_array($Consulta_registros2)) {
							$nro_tarifa = $reg['NroTarifa'];

							if ($categoria == "primera"){
								$tarifa = $reg['Precio_Primary'];
							}else {
								$tarifa = $reg['PrecioEconomico'];
							}
						}


						$codigo = generar_clave(6);
						echo "Pasajero Adulto ".$i.": ".$nomAdul." ".$apAdul."<br>";
						echo "Codigo de Reserva Ida: ".$codigo."<br>";
						echo "Usted se encuentra en lista de Espera<br>";
						//borrar cuando el circuito funcione!!1
						echo "Tipo de Avion: ".$TipoAvion;
						echo "<br>Cantidad de Asientos en el avion: ".$totalAsientosAvion;
						echo "<br>Cantidad de perosonas q viajaran: ".$totalIda."<br><br>";
					
						$registros = mysql_query(" INSERT INTO pasaje (nroVuelo, idPasajero, NroTarifa, categoria, claveAuto, tarifa, fecha_Salida, habilitado ) 
						VALUES ('".$nroVueloIda."', '".$id_pasajero."' , '".$nro_tarifa."', '".$categoria."', '".$codigo."', '".$tarifa."', '".$fechap."', 'no' ) ", 
                      	$conexion) or die("Problemas en el select:".mysql_error());
					}else{
						echo "Lo Sentimos pero el vuelo de ida se encuentra lleno, por favor seleccione otro vuelo. Disculpe por las molestias";
					}
					// CARGAR EN LA TABLA PASAJE.. VUELTA ADULTOS!!! //
					if ($_SESSION['viaje'] == 'iyv') {
						
						$Consulta_registros4 = mysql_query(" SELECT TA.idTarifa as NroTarifa, 
							                                      TA.Precio_Economy as PrecioEconomico , 
							                                      TA.Precio_Primary as Precio_Primary 
						                                   from vuelo V1 
						                                   inner join aeropuerto A1 on V1.Aepto_Origen = A1.idAepto 
						                                   inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto 
						                                   inner join tarifa as TA on V1.Aepto_Destino = TA.Aepto_Destino and V1.Aepto_Origen = TA.Aepto_Origen	
						                                   where A1.Ciudad = '".$var2."' 
						                                   and A2.Ciudad = '".$var1."'  ", $conexion) 
						                                   or die("Problemas en el select:".mysql_error());

						while ($reg = mysql_fetch_array($Consulta_registros4)) {
							$nro_tarifa = $reg['NroTarifa'];

							if ($categoria == "primera"){
								$tarifa = $reg['Precio_Primary'];
							}else {
								$tarifa = $reg['PrecioEconomico'];
							}
						}
						//VERIFICAR SI HAY LUGAR EN EL VUELO SELECCIONADO ******* COMIENZO ********
						$Cuenta=mysql_query(" SELECT COUNT(*) as Total
											FROM pasaje 
											WHERE nroVuelo = '".$nroVueloVuelta."'  ", $conexion) or die("Problemas en el select:".mysql_error());
						
						while ($reg = mysql_fetch_array($Cuenta)){
									$totalVuelta = $reg[0];//Cantidad de personas q viajan a la ida
								}

						$Consulta2 = mysql_query(" SELECT idAvion
												   FROM vuelo
												   WHERE idVuelo = '".$nroVueloVuelta."'  ", $conexion) or die("Problemas en el select:".mysql_error());
							
						while ($reg = mysql_fetch_array($Consulta2)) {
							$idAvionVuelta = $reg['idAvion'];	//id del avion que realiza el viaje de ida
						}

						$Consulta3 = mysql_query(" SELECT Economico, Primera, Tipo
												   FROM avion
												   WHERE idAvion = '".$idAvionVuelta."'  ", $conexion) or die("Problemas en el select:".mysql_error());
							
						while ($reg = mysql_fetch_array($Consulta3)) { //Datos de el avion..
							$EconomicoVuelta = $reg['Economico'];
							$PrimeraVuelta = $reg['Primera'];
							$TipoAvionVuelta = $reg['Tipo'];
						}
						$totalAsientosAvionVuelta = $EconomicoVuelta + $PrimeraVuelta;

						//VERIFICAR SI HAY LUGAR EN EL VUELO SELECCIONADO ******* FINAL ********
						
						if ($totalVuelta <= $totalAsientosAvionVuelta) {
							
							$codigo = generar_clave(6);
							echo "Pasajero Adulto ".$i.": ".$nomAdul." ".$apAdul."<br>";
							echo "Codigo de Reserva Vuelta: ".$codigo."<br>";
							//borrar cuando el circuito funcione!!1
							echo "Tipo de Avion: ".$TipoAvionVuelta;
							echo "<br>Cantidad de Asientos en el avion: ".$totalAsientosAvionVuelta;
							echo "<br>Cantidad de perosonas q viajaran: ".$totalVuelta."<br><br>";
						
							$registros=mysql_query(" INSERT INTO pasaje (nroVuelo, idPasajero, NroTarifa, categoria, claveAuto, tarifa, fecha_Salida, habilitado ) 
							VALUES ('".$nroVueloVuelta."', '".$id_pasajero."' , '".$nro_tarifa."', '".$categoria."', '".$codigo."', '".$tarifa."', '".$fechar."', 'si' ) ", 
	                        $conexion) or die("Problemas en el select:".mysql_error());
						
						}elseif ($totalIda <= ($totalAsientosAvion + 10)) {
							$codigo = generar_clave(6);
							echo "Pasajero Adulto ".$i.": ".$nomAdul." ".$apAdul."<br>";
							echo "Codigo de Reserva Vuelta: ".$codigo."<br>";
							echo "Usted se encuentra en lista de Espera<br>";
							//borrar cuando el circuito funcione!!1
							echo "Tipo de Avion: ".$TipoAvionVuelta;
							echo "<br>Cantidad de Asientos en el avion: ".$totalAsientosAvionVuelta;
							echo "<br>Cantidad de perosonas q viajaran: ".$totalVuelta."<br>";
						
							$registros=mysql_query(" INSERT INTO pasaje (nroVuelo, idPasajero, NroTarifa, categoria, claveAuto, tarifa, fecha_Salida, habilitado ) 
							VALUES ('".$nroVueloVuelta."', '".$id_pasajero."' , '".$nro_tarifa."', '".$categoria."', '".$codigo."', '".$tarifa."', '".$fechar."', 'no' ) ", 
	                        $conexion) or die("Problemas en el select:".mysql_error());
						}else{
						echo "Lo Sentimos pero el vuelo de ida se encuentra lleno, por favor seleccione otro vuelo. Disculpe por las molestias";
						}
					}
				}
				// MENORES!! //
				for ($i= 1; $i <= $_SESSION['menores'] ; $i++){
					
					$apMen = $_POST['appMen'.$i];
					$nomMen = $_POST['nomMen'.$i];
					$sexMen = $_POST['sexMen'.$i];
					$fnacMen = $_POST['anioMen'.$i]."-".$_POST['mesMen'.$i]."-".$_POST['diaMen'.$i];
					$tdniMen = $_POST['tipodniMen'.$i];
					$dninumMen = $_POST['dninumMen'.$i];

					$Insert_registros = mysql_query(" INSERT INTO pasajero (Nombre, Apellido, Tipo_doc, Dni, Fec_Nac, Email ) 
					VALUES ('".$nomMen."', '".$apMen."' , '".$tdniMen."' , '".$dninumMen."' , '".$fnacMen."', '".$email."' )", 
				    $conexion) or die("Problemas en el select:".mysql_error());


				    $Consulta_registros1=mysql_query(" SELECT idPasajero FROM pasajero WHERE dni = ".$dninumMen."  ", 
                    $conexion) or die("Problemas en el select:".mysql_error());

					while ($reg = mysql_fetch_array($Consulta_registros1)){
						$id_pasajero = $reg['idPasajero'];						
					}
					
					$Consulta_registros2=mysql_query(" SELECT TA.idTarifa as NroTarifa, 
						                                      TA.Precio_Economy as PrecioEconomico , 
						                                      TA.Precio_Primary as Precio_Primary 
					                                   from vuelo V1 
					                                   inner join aeropuerto A1 on V1.Aepto_Origen = A1.idAepto 
					                                   inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto 
					                                   inner join tarifa as TA on V1.Aepto_Destino = TA.Aepto_Destino and V1.Aepto_Origen = TA.Aepto_Origen	
					                                   where A1.Ciudad = '".$var1."' 
					                                   and A2.Ciudad = '".$var2."'  ", $conexion) 
					                                   or die("Problemas en el select:".mysql_error());

					while ($reg = mysql_fetch_array($Consulta_registros2)) {
						$nro_tarifa = $reg['NroTarifa'];

						if ($categoria == "primera"){
							$tarifa = $reg['Precio_Primary'];
						}else {
							$tarifa = $reg['PrecioEconomico'];
						}
					}

					$codigo = generar_clave(6);
					echo "Pasajero Menor ".$i.": ".$nomMen." ".$apMen."<br>";
					echo "Codigo de Reserva Ida: ".$codigo."<br><br>";

				
					$registros = mysql_query(" INSERT INTO pasaje (nroVuelo, idPasajero, NroTarifa, categoria, claveAuto, tarifa, fecha_Salida ) 
					VALUES ('".$nroVueloIda."', '".$id_pasajero."' , '".$nro_tarifa."', '".$categoria."', '".$codigo."', '".$tarifa."', '".$fechap."' ) ", 
					$conexion) or die("Problemas en el select:".mysql_error());

					//$id++;

					//CARGAR EN LA TABLA PASAJE SI ESTA SELECCIONADO IDA Y VUELTA PARA MENORES

					if ($_SESSION['viaje'] == 'iyv') {

						$Consulta_registros1 = mysql_query(" SELECT idPasajero FROM pasajero WHERE dni = ".$dninumMen."  ", 
                        $conexion) or die("Problemas en el select:".mysql_error());

						while ($reg = mysql_fetch_array($Consulta_registros1)){
							$id_pasajero = $reg['idPasajero'];						
						}
						
						$Consulta_registros2 = mysql_query(" SELECT TA.idTarifa as NroTarifa, 
							                                      TA.Precio_Economy as PrecioEconomico , 
							                                      TA.Precio_Primary as Precio_Primary 
						                                   from vuelo V1 
						                                   inner join aeropuerto A1 on V1.Aepto_Origen = A1.idAepto 
						                                   inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto 
						                                   inner join tarifa as TA on V1.Aepto_Destino = TA.Aepto_Destino and V1.Aepto_Origen = TA.Aepto_Origen	
						                                   where A1.Ciudad = '".$var2."' 
						                                   and A2.Ciudad = '".$var1."'  ", $conexion) 
						                                   or die("Problemas en el select:".mysql_error());

						while ($reg = mysql_fetch_array($Consulta_registros2)) {
							
							$nro_tarifa = $reg['NroTarifa'];

							if ($categoria == "primera"){
								$tarifa = $reg['Precio_Primary'];
							}else {
								$tarifa = $reg['PrecioEconomico'];
							}
						}

						$codigo = generar_clave(6);
						echo "Pasajero Menor ".$i.": ".$nomMen." ".$apMen."<br>";
						echo "Codigo de Reserva Vuelta: ".$codigo."<br><br>";
					
						$registros=mysql_query(" INSERT INTO pasaje (nroVuelo, idPasajero, NroTarifa, categoria, claveAuto, tarifa, fecha_Salida ) 
						VALUES (".$nroVueloVuelta."', '".$id_pasajero."' , '".$nro_tarifa."', '".$categoria."', '".$codigo."', '".$tarifa."', '".$fechar."' ) ", 
						$conexion) or die("Problemas en el select:".mysql_error());
					}
				}
			?>
			</div>
			<div class="clr"></div>
			<p class="color1"> Ahora podes abonar tu pasaje desde nuestra pagina.. rapido,facil y sin moverte de tu casa. Solo hace click en el boton Pagar e ingresa tu codigo de reserva.-</p>
			<a href="index-pago.php" class="button2">Pagar</a>
			<br><div class="clr"></div>
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