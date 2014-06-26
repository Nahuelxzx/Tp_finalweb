<!DOCTYPE html>
<html lang="en">
<head>
	<title> Airlines.com </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
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
<body id="page1">
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
							<li class="bg_none"><a href="#" id="loginButton"><img src="images/img3.gif" alt=""></a></li>
						</ul>
							<div style="clear:both"></div>
			                <div id="loginBox">
			                    <form id="loginForm">
			                        <fieldset id="body">
			                            <fieldset>
			                                <label for="email">Email</label>
			                                <input type="text" name="email" id="email" />
			                            </fieldset>
			                            <fieldset>
			                                <label for="password">Contrase&ntilde;a</label>
			                                <input type="password" name="password" id="password" />
			                            </fieldset>
			                            <input type="submit" id="login" value="Entrar" />
			                            <label for="checkbox"><input type="checkbox" id="checkbox" />Recu&eacute;rdame</label>
			                        </fieldset>
			                        <span><a href="#">Perdiste tu contrase&ntilde;a?</a></span>
			                    </form>
			                </div>
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
		<a href="index-3.php" class="button_top">Realiza tu check - in</a>
	</div>
</div>
<!-- / header -->
<div class="main">
<!-- content -->
	<section id="content">
		<article class="col1">
			<div class="pad_1">
				<h2>Vuelos</h2>
				<form id="form_1" action="index-1.php" method="POST">
					<div class="wrapper pad_bot1">
						<div class="radio marg_right1">
							<label><input type="radio" name="viaje" value="iyv" checked="checked" onclick="ocultar(this)">Ida y Vuelta</label><br>
							<label><input type="radio" name="viaje" value="si" onclick="ocultar(this)">Solo Ida</label>
						</div>
						<div class="radio">
							<label><input type="radio" name="clase" value="primera">Primera</label><br>
							<label><input type="radio" name="clase" value="economy">Economy</label>
						</div>
					</div>
					<div class="wrapper">
						Origen:
						<div class="bg"><input type="text" id="search" required name="Origen" required class="input input1" placeholder="Ingrese su Origen"></div>
							<?php
								require_once "Conexion/estructuraConsulta.php";

								$Consulta_Ciudad = new estructuraModelo();
								$clientes = $Consulta_Ciudad->get_sql('select ciudad from aeropuerto order by ciudad');

								$arreglo_php = array();
								
								if (count ($clientes) < 0) {  
         							      array_push($arreglo_php, "No hay datos");
								                           }
								else{
								      foreach ($clientes as $row)
								       {
								         array_push($arreglo_php, $row['ciudad']);          
								       }
								    }
							?>
							<script type="text/javascript">
										 $(function(){
										    var autocompletar = new Array();
										    <?php //Esto es un poco de php para obtener lo que necesitamos
										     for($p = 0;$p < count($arreglo_php); $p++){ ?> //usamos count para saber cuantos elementos hay 
										       autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
										     <?php } ?>
										     $("#search").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
										       source: autocompletar //Le decimos que nuestra fuente es el arreglo
										     });
										     $("#search1").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
										       source: autocompletar //Le decimos que nuestra fuente es el arreglo
										     });
										  });
							</script>
					</div>
					<div class="wrapper">
						Destino:
						<div class="bg"><input type="text" id="search1" required name="destino" required class="input input1" placeholder="Ingrese su Destino"></div>
					</div>
					<div class="wrapper">
						Partida:
						<div class="wrapper">
							<div class="bg left"><input type="text" required name="fechap" id="txtStartDate" class="input input2" placeholder="dd/mm/yyyy"></div>
							<div class="bg right"><input type="text" class="input input2" placeholder="12:00am"></div>
						</div>
					</div>
					<div class="wrapper">
						<div id="ocultarDiv" style="display:block">
							Regreso:
						<div class="wrapper">
							<div class="bg left"><input type="text" name="fechar" id="txtEndDate" class="input input2" placeholder="dd/mm/yyyy"></div>
							<div class="bg right"><input type="text" class="input input2" placeholder="12:00am"></div>
						</div></div>
					</div>
					<div class="wrapper_1">
						Adulto(s):
						<div class="bg left">
							<select name="cantAdul">
		                      <option value="1">1</option>
		                      <option value="2">2</option>
		                      <option value="3">3</option>
		                      <option value="4">4</option>
		                    </select>
						</div>
					</div>
					<div class="wrapper_1">
						Menor(es):
						<div class="bg left">
							<select name="cantMen">
							  <option value="0">0</option>
		                      <option value="1">1</option>
		                      <option value="2">2</option>
		                      <option value="3">3</option>
		                      <option value="4">4</option>
		                    </select>
		                </div>
					</div>
					<div class="wrapper_2">
					<!--<a href="datos.php" class="button2" onClick="document.getElementById('form_1').submit()"> Buscar </a> -->
					<input type="submit" class="button2" id="boton" value="Buscar"/>
					</div>
				</form>
				<div class="clr"></div>
				<h2>Noticias Recientes</h2>
				<p class="under"><a href="#" class="link1">Nuevos Destinos a tu alcance..</a><br>Mayo 20, 2014</p>
				<p><a href="#" class="link1">Los Precios mas baratos..</a><br>Febrero 12, 2014</p>
			</div>
		</article>
		<article class="col2 pad_left1">
			<h2>Bienvenido a nuestra Website!</h2>
			<p class="color1"> Airlines.com le ofrece las mejores ofertas de vuelos al mejor precio y de la forma más segura, para que viaje al destino que está buscando. Realice su reserva por medio de la caja de búsqueda, seleccione el destino, la fecha y reserve sus vuelos baratos al sitio que siempre soñó.-</p>
			<div class="marker">
				<div class="wrapper">
					<p class="pad_bot2"><strong>Viajá con los precios mas baratos</strong></p>
					<p class="pad_bot2">La compañía aérea Airlines ofrece para todos los turistas miles de ofertas y descuentos en pasajes baratos para viajar a casi todos los destinos del mundo. Airlines es una empresa...</p>
				</div>
			</div>
			<div class="wrapper pad_bot2">
				<a href="#" class="button2">Leer Mas</a>
			</div>
			<div class="wrapper">
				<article class="cols">
					<h2>Nuestros Compromiso</h2>
					<p><strong>Airlines</strong> te permite conocer las opiniones de nuestros clientes. .</p>
					<p>¿Qué mejor manera de saber cómo una empresa está haciendo que escucharlo directamente de otros consumidores?. Las <a href="#">opiniones</a> de nuestros clientes son el núcleo de nuestro concepto.-</p>
				</article>
				<div class="box1">
					<div class="pad_1">
						<div class="wrapper">
							<p class="pad_bot2"> advertencia en cambios de horarios de vuelo, recordatorios, guía turística, etc.,  te da tranquilidad, respaldo y la posibilidad de elegir el mejor precio. Exelete! </p>
							<p><span class="right"> Sr. Marcelo Recondo</span>&nbsp;<br></p>
						</div>
					</div>
				</div>
			</div>
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