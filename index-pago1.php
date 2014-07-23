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
	<?php
	session_start();
	
	if (isset($_POST['apellido']))
		$_SESSION['apellido'] = $_POST['apellido'];
	if (isset($_POST['codigo_reserva']))
		$_SESSION['codigo_reserva'] = $_POST['codigo_reserva'];
	?>
	<script type="text/javascript">
		window.onload = inicio
        
	    function inicio(){
	        document.getElementById("PagoFormu").onsubmit = validamos;
	    }
	</script>
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
				<h2> Pago </h2>
				<form id="form_pago" action="index-pago1.php" method="post">

					<div class="wrapper3">
						Apellido :
						<div class="bg"><input type="text" required name="apellido" class="input input1" value="<?php if (isset($_POST['apellido'])) { echo $_POST['apellido'];} ?>" ></div>
					</div>
					<div class="wrapper3">
						Codigo de Reserva :
						<div class="bg"><input type="text" maxlength='6' required name="codigo_reserva" class="input input1" value="<?php if (isset($_POST['codigo_reserva'])) { echo $_POST['codigo_reserva'];} ?>" ></div>
					</div>

					<div class="wrapper3">
					<!--<a href="#" class="button2" onClick="document.getElementById('form_1').submit()">go!</a>-->
					<input type="submit" class="button2" value="Enviar">
					</div>

				</form>
				<div class="clr"></div>
				<h2>Noticias Recientes</h2>
				<p class="under"><a href="#" class="link1">Nuevos Destinos a tu alcance..</a><br>Mayo 20, 2014</p>
				<p><a href="#" class="link1">Los Precios mas baratos..</a><br>Febrero 12, 2014</p>
			</div>
		</article>
		<article class="col2 pad_left1">
			<h2><strong> Formas de Pago: </strong></h2>
			<form id="PagoFormu" action="index-pago2.php" method="POST">
				<?php
					$clave = $_POST['codigo_reserva'];

					$conexion = mysql_connect("localhost","root","") or die("Problemas en la conexion");
					mysql_select_db("tp_finalweb2",$conexion) or die("Problemas en la selección de la base de datos");

					$Consulta0 = mysql_query(" SELECT *
										   FROM pasaje
										   WHERE claveAuto = '".$clave."'  ", $conexion) or die("Problemas en el select:".mysql_error());
					
					if (mysql_num_rows($Consulta0)>0){
				
						$Consulta = mysql_query(" SELECT habilitado, nroVuelo
											   FROM pasaje
											   WHERE claveAuto = '".$clave."'  ", $conexion) or die("Problemas en el select:".mysql_error());
						
						while ($reg = mysql_fetch_array($Consulta)) {
							$habilitado = $reg['habilitado'];
							$nroVuelo = $reg['nroVuelo'];
						}

						if ($habilitado == 'si') {

						$Consulta = mysql_query('SELECT AEPTO1.Ciudad as Origen, 
											AEPTO2.Ciudad as Destino,
											PJ.claveAuto AS Clave, 
											PJ.tarifa AS Tarifa, 
											V1.idVuelo AS NroVuelo, 
											PJ.categoria AS Categoria, 
											PRO.Nombre AS Nombre, 
											PRO.apellido AS Apellido, 
											PJ.fecha_salida AS FechaSalida, 
											V1.Hora_Salida AS Hora
											FROM pasaje PJ
											INNER JOIN pasajero PRO ON PJ.idPasajero = PRO.idPasajero
											INNER JOIN vuelo V1 ON PJ.nroVuelo = V1.idVuelo
											INNER JOIN aeropuerto AEPTO1 ON V1.Aepto_Origen = AEPTO1.idAepto
											INNER JOIN aeropuerto AEPTO2 ON V1.Aepto_Destino = AEPTO2.idAepto
											WHERE PJ.claveAuto =  "'.$clave.'"', $conexion) or die("Problemas en el select:".mysql_error());

						while ($reg = mysql_fetch_array($Consulta)) {
							$Origen = $reg['Origen'];
							$Destino = $reg['Destino'];
							$Clave = $reg['Clave'];
							$Tarifa = $reg['Tarifa'];
							$NroVuelo = $reg['NroVuelo'];
							$Categoria = $reg['Categoria'];
							$Nombre = $reg['Nombre'];
							$Apellido = $reg['Apellido'];
							echo "<div class='wrapper'>";
							echo "Pasajero : ".$Nombre." ".$Apellido."<br>";
							echo "Origen: ".$Origen."&nbsp;&nbsp;&nbsp; Destino: ".$Destino."<br>";
							echo "Tarifa: ".$Tarifa."<br>";
							echo "</div>";
						}

						
						echo "<div>
						<div class='wrapper'>
						    Nombre Titular:
						    <div class='bg'><input type='text' class='input' name='nomTit' required placeholder='Ingrese Nombre'/></div>
						</div>
						<div class='wrapper'>
						    Apellido Titular:
						    <div class='bg'><input type='text' class='input' name='ApTit' required placeholder='Ingrese Apellido'/></div>
						</div>
						<div class='wrapper'>
						    Documento:
						    <div class='bg1'><input type='text' id='dni' name='numdniTit' class='input1' maxlength='8' required placeholder='Ingrese Numero de Documento'/></div>
						    <div class='bg1'><select name='tipodniTit'><option value='dni'>DNI</option><option value='le'>L.E</option><option value='lc'>L.C</option></select></div>
						</div>
						<div class='wrapper'>
							Numero de Tarjeta:
							<div class='bg'><input type='text' maxlength='16' required name='numTarj' id='numTarj' class='input' placeholder='Ingrese los 16 digitos'/></div>
						</div>
						<div class='wrapper'>
							Vencimiento:
							<div class='bg1'><input type='text' required name='anioVenc' size='2' placeholder='aa' maxlength='2' class='input2'> </div>
							<div class='bg1'><input type='text' required name='mesVenc' size='2' placeholder='mm' maxlength='2' class='input2'> </div>
						</div>
						<div class='wrapper'>
							Tarjeta:
							<div class='bg'>
								<select name='tarjeta'>
									<option value='visa'> Visa </option>
									<option value='americanExpress'> American Express </option>
									<option value='master'> Master Card </option>
								</select>
							</div>
						</div>
						<div class='wrapper'>
							Coutas:
							<div class='bg1'>
								<select name='cuotas'>
									<option value='1cuota'> 1 Cuota </option>
									<option value='6cuotas'> 6 Cuotas </option>
								</select>
							</div>
						</div>			
						<div id='ok'></div><br>
						<input type='submit' class='button2' id='boton' value='Enviar'/>
						<input type='reset' class='button2' id='boton' value='Cancelar'/>
						</div>
						<div class='clr'></div>";
						}else{
						echo "Su codigo de reserva se encuentra en lista de espera.. <br>";
						echo "Por el momento no puede realizar el pago correspondiene.- <br>";
						}
					} else {
					echo "Su codigo de Reserva es inexistente.. por favor verifiquelo y vuelva a ingresarlo";
					}
				?>
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