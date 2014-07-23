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
					<li><a href="index-pago.php"> Pago </a></li>
					<li id="menu_active"><a href="index-3.php">Check - in</a></li>
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
				<h2> Check - in </h2>
				<form id="form_checkin" action="index-3a.php" method="post">

					<div class="wrapper3">
						Apellido :
						<div class="bg"><input type="text" required name="apellido" class="input input1" value="<?php if (isset($_POST['apellido'])) { echo $_POST['apellido'];} ?>" ></div>
					</div>
					<div class="wrapper3">
						Codigo de Reserva :
						<div class="bg"><input type="text" required name="codigo_reserva" class="input input1"  value="<?php if (isset($_POST['codigo_reserva'])) { echo $_POST['codigo_reserva'];} ?>" ></div>
					</div>
					<div class="wrapper3">
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
			<h2>Seleccione su Asiento</h2>
			<form id="checkin" name="checkin" action="index-3b.php" method="POST">
				<?php
					date_default_timezone_set('America/Sao_Paulo');

					session_start();
					
					if (isset($_POST['apellido'])) 
						$_SESSION['apellido'] = $_POST['apellido'];
					if (isset($_POST['codigo_reserva'])) 
						$_SESSION['codigo_reserva'] = $_POST['codigo_reserva'];

					$conexion = mysql_connect("localhost","root","") or die("Problemas en la conexion");
					mysql_select_db("tp_finalweb2",$conexion) or die("Problemas en la selección de la base de datos");

					$apellido = $_POST['apellido'];

					$codigo_reserva = $_POST['codigo_reserva'];

					$Consulta01 = mysql_query("SELECT psj.Fecha_Salida, vl.Hora_Salida
											   FROM pasaje as psj JOIN vuelo as vl ON psj.nroVuelo = vl.idVuelo
											   WHERE claveAuto = '".$codigo_reserva."'  ", $conexion) or die("Problemas en el select:".mysql_error());
						
					while ($reg = mysql_fetch_array($Consulta01)) {
						$Fecha_Salida = $reg['Fecha_Salida'];
						$Hora_Salida = $reg['Hora_Salida'];
					}

					$Consulta0 = mysql_query("SELECT *
										   FROM pasaje
										   WHERE claveAuto = '".$codigo_reserva."' ", $conexion) or die("Problemas en el select:".mysql_error());
					
					if (mysql_num_rows($Consulta0)>0) { //consulta si el codigo ingresado existe en la base

						$fecha = date($Fecha_Salida." ".$Hora_Salida);
						$nueva_fecha48 = strtotime('-48 hour', strtotime($fecha));
						//$nueva_fecha48 = date('Y-m-d H:i:s', $nueva_fecha48);
						$nueva_fecha2 = strtotime('-1 hour', strtotime($fecha));
						//$nueva_fecha2 = date('Y-m-d H:i:s', $nueva_fecha2);
						$fecha_actual = strtotime(date('Y-m-d H:i:s'));

						echo "<br> fecha de salida del avion: ".$fecha;
						echo "<br> Nueva fecha 48hs antes: ".$nueva_fecha48;
						echo "<br> Nueva fecha 2hs antes: ".$nueva_fecha2;
						echo "<br>".$fecha_actual;

						if ( ($fecha_actual - $nueva_fecha2) < 0 && ($fecha_actual - $nueva_fecha48) > 0) {		

							$Consulta = mysql_query("SELECT habilitado, asiento
												   FROM pasaje
												   WHERE claveAuto = '".$codigo_reserva."'  ", $conexion) or die("Problemas en el select:".mysql_error());
					
							while ($reg = mysql_fetch_array($Consulta)) {
								$habilitado = $reg['habilitado'];
								$asiento = $reg['asiento'];
							}

							if ($habilitado == 'pago' && $asiento == 0) {

								$Consulta = mysql_query("SELECT idPasajero, categoria, nroVuelo
								   FROM pasaje 
								   WHERE claveAuto = '".$codigo_reserva."'  ", $conexion) or die("Problemas en el select:".mysql_error());
			
								while ($reg = mysql_fetch_array($Consulta)) {
									$id_pasajero = $reg['idPasajero'];
									$clase = $reg['categoria'];	
									$nroVuelo = $reg['nroVuelo'];				
								}

								$Consulta1 = mysql_query("SELECT DISTINCT asiento
													   FROM pasaje
													   WHERE nroVuelo = '".$nroVuelo."' AND Fecha_Salida = '".$Fecha_Salida."'  ", $conexion) or die("Problemas en el select:".mysql_error());
								$i = 0;
								while ($reg = mysql_fetch_array($Consulta1)) {
									$asientos_ocupados[$i] = $reg['asiento'];
									$i++;
								}
								
								$Consulta1 = mysql_query("SELECT idAvion
													   FROM vuelo
													   WHERE idVuelo = '".$nroVuelo."'  ", $conexion) or die("Problemas en el select:".mysql_error());
								
								while ($reg = mysql_fetch_array($Consulta1)) {
									$idAvion = $reg['idAvion'];	
								}

								$Consulta2 = mysql_query("SELECT Fila_Eco, Columna_Eco, Fila_Pri, Columna_Pri, Tipo
													   FROM avion
													   WHERE idAvion = '".$idAvion."'  ", $conexion) or die("Problemas en el select:".mysql_error());
								
								while ($reg = mysql_fetch_array($Consulta2)) {
									$Fila_Eco = $reg['Fila_Eco'];
									$Columna_Eco = $reg['Columna_Eco'];	
									$Fila_Pri = $reg['Fila_Pri'];	
									$Columna_Pri = $reg['Columna_Pri'];	
									$tipoAvion = $reg['Tipo'];
								}
								
								echo "<p class='pad_bot2'>
									<div class='marker'>Apellido: ".$apellido."</div>
									<div class='marker'>Codigo de Reserva: ".$codigo_reserva."</div>
								</p>
								<div id='contenedor_descripcion'> 
									<ul id='butacas_descripcion'>
										<li style='background:url(\"images/vacia.gif\") no-repeat scroll 0 0 transparent;'>Disp.</li>
										<li style='background:url(\"images/ocupada.gif\") no-repeat scroll 0 0 transparent;'> Ocuada</li>
										<li style='background:url(\"images/selec.gif\") no-repeat scroll 0 0 transparent;'>Selec.</li>
									</ul>
							    </div>
							    <div id='contenedor_butacas'>
								    <div id='holder".$tipoAvion."-".$clase."'> 
										<ul  id='place'> </ul>    
								    </div>
							     </div>
							    <div class='clr'></div><br>
							    <input type='submit' class='button2' id='btnShowNew' value='Enviar'>";
							}else {
								echo "Por el momento no puede realizar el Check-in correspondiene.- <br>";
							}
						} else{
							echo "<br>El check-in se habilita solo de 48hs a 2hs antes del horario de vuelo";
						}
					} else {
					echo "Su codigo de Reserva es inexistente.. por favor verifiquelo y vuelva a ingresarlo";
					}     
				?>
			</form>
		</article>
	</section>

	<script type="text/javascript">
		$(function () {
		  var settings = {
		  cantPasajeros: 1,
		  rows: <?php if ($clase == 'primera') { echo $Fila_Pri;}else{echo $Fila_Eco;} ?>,              //filas
		  cols: <?php if ($clase == 'primera') { echo $Columna_Pri;}else{echo $Columna_Eco;} ?>,           //columnas
		  rowCssPrefix: 'row-',
		  colCssPrefix: 'col-',
		  seatWidth: 50,          //Espacio entre butacas Ancho
		  seatHeight: 40,         //Espacio entre butacas Alto
		  seatCss: 'seat',
		  selectedSeatCss: 'selectedSeat',
		  selectingSeatCss: 'selectingSeat'
		};

		var init = function (reservedSeat) {
		var str = [], seatNro, className;

			for (i = 0; i < settings.rows; i++) {
			    for (j = 0; j < settings.cols; j++) {
			        seatNro = (i + j * settings.rows + 1);
			        className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();

			        if ($.isArray(reservedSeat) && $.inArray(seatNro, reservedSeat) != -1) {
			          className += ' ' + settings.selectedSeatCss;
			        }
			        str.push('<li class="'+className+'"'+'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
			                '<a title="' + seatNro + '">' + seatNro + '</a>' +
			                '</li>');
			    }
			}
			$('#place').html(str.join(''));
		};

		var bookedSeats = [<?php foreach ($asientos_ocupados as  $valor) { echo $valor." ,"; } ?>]; //Butacas Ocupadas

		Elegir = 0;
		init(bookedSeats);

		$('.' + settings.seatCss).click(function () {
		    if ($(this).hasClass(settings.selectedSeatCss)){
		        alert('Esta butaca se encuentra ocupada'); // si la butaca se encuentra ocupada avisar con un alert
		    }else if ($(this).hasClass(settings.selectingSeatCss)) { // pregunta si la butaca ya esta seleccionada?
		    		  $(this).removeClass(settings.selectingSeatCss); // si esta seleccionada la deselecciona
		    } else  {
		   	        var str = [];
		            $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {              
		            str.push($(this).attr('title'));                   
		            });
		            if (str.length < settings.cantPasajeros) {
		                $(this).toggleClass(settings.selectingSeatCss);
		            }else{
		                alert('Solo puede seleccionar '+settings.cantPasajeros+' asientos');
		            }
		    }  
		});

		$('#btnShowNew').click(function (){ // muestra solo las q selecciono
		    var str = [], item;
		    $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
		    item = $(this).attr('title');                   
		    str.push(item);                   
		    });
			document.cookie ='variable='+ str.join(',') +'; expires=Thu, 2 Aug 2021 20:47:11 UTC; path=/';
		    })
			
		});
	</script>
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