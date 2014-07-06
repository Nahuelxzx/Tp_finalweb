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
        #holder1{height:410px; width:140px; background-color:#F5F5F5; border:1px solid #A4A4A4; margin-left:150px;padding-left: 10px; padding-right: 10px}
        #holder2{height:570px; width:240px; background-color:#F5F5F5; border:1px solid #A4A4A4; margin-left:115px;padding-left: 10px; padding-right: 10px}
        #holder3{height:850px; width:240px; background-color:#F5F5F5; border:1px solid #A4A4A4; margin-left:110px;padding-left: 10px; padding-right: 10px}
        #holder4{height:1210px; width:190px; background-color:#F5F5F5; border:1px solid #A4A4A4; margin-left:120px;padding-left: 10px; padding-right: 10px}
        #place {position:relative; margin:7px;}
        #place a{font-size:10px; text-decoration: none; color: black;}
        #place li{list-style: none outside none; position: absolute;}    
        #place li:hover{background-color: #fff;} 
        #place .seat{background:url("images/vacia.gif") no-repeat scroll 0 0 transparent;height:33px; width:33px; display:block;}
        #place .selectedSeat{background-image:url("images/ocupada.gif");}
        #place .selectingSeat{background-image:url("images/selec.gif");}
    	#contenedor_descripcion{float: right;}
    	#contenedor_butacas{float: left;}
    	#butacas_descripcion li {padding: 20px;}
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
			<h2>Seleccione su Asiento</h2>
			<form id="PagoForm" action="index-2a.php" method="POST">
				<?php
				    //session_start();
				    //$totalAsiento = $_SESSION['adultos'] + $_SESSION['menores'];
				    $totalAsiento = 2;

				    //echo "Asientos que puede seleccionar: ".$totalAsiento;
				    echo "<br>";

				    $tipoAvion = 1;

				    require_once "Conexion/estructuraConsulta.php";

				    $Consulta = new estructuraModelo();

				    $diasvuelos = $Consulta->get_sql("SELECT DISTINCT Fila_eco, Columna_eco FROM avion WHERE Tipo = '".$tipoAvion."'");
				    
				    foreach ($diasvuelos as $row) {
				       // echo "fila: ".$row['Fila_eco']." columna: ".$row['Columna_eco']."<br><br>";
				        $filaAvion = $row['Fila_eco'];
				        $columnaAvion = $row['Columna_eco'];
				    }
				?>
				<div id="contenedor_descripcion"> 
			      <ul id="butacas_descripcion">
			        <li style="background:url('images/vacia.gif') no-repeat scroll 0 0 transparent;">Disp.</li>
			        <li style="background:url('images/ocupada.gif') no-repeat scroll 0 0 transparent;"> Ocuada</li>
			        <li style="background:url('images/selec.gif') no-repeat scroll 0 0 transparent;">Selec.</li>
			      </ul>
			    </div>
			    <div id="contenedor_butacas">
			    <div id="holder<?php echo $tipoAvion?>"> 
			      <ul  id="place"> </ul>    
			    </div>
			     </div>
			     <div class="clr"></div><br>
			      <input type="button" class="button2" id="btnShowNew" value="Mostrar butacas seleccionadas" />
			      <input type="button" class="button2" id="btnShow" value="Mostrar Ocupadas" />           
			</form>
		</article>
	</section>
	<script type="text/javascript">
	$(function () {
	  var settings = {
	  cantPasajeros: <?php echo $totalAsiento; ?>,
	  rows: <?php echo $filaAvion; ?>,              //filas
	  cols: <?php echo $columnaAvion; ?>,           //columnas
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

	var bookedSeats = [5, 10];   //Butacas Ocupadas

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

	$('#btnShow').click(function () { //muestra las q selecciono y estan ocupadas
	    var str = [];
	    $.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
	    str.push($(this).attr('title'));
	    });
	    alert(str.join(','));
	})

	$('#btnShowNew').click(function (){ // muestra solo las q selecciono
	    var str = [], item;
	    $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
	    item = $(this).attr('title');                   
	    str.push(item);                   
	    });
	    alert(str.join(','));
	    })
	});
	</script>
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