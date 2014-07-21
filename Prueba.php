<?php
	date_default_timezone_set('America/Sao_Paulo');

	session_start();

	$apellido = $_SESSION['apellido'];
	$codigo_reserva = $_SESSION['codigo_reserva'];

	$conexion01 = mysql_connect("localhost","root","") or die("Problemas en la conexion");
	mysql_select_db("tp_finalweb2",$conexion) or die("Problemas en la selección de la base de datos");

	$Consulta01 = mysql_query("SELECT psj.Fecha_Salida, vl.Hora_Salida
						   FROM pasaje as psj JOIN vuelo as vl ON psj.nroVuelo = vl.idVuelo
						   WHERE claveAuto = '".$codigo_reserva."'  ", $conexion) or die("Problemas en el select:".mysql_error());
	
	while ($reg = mysql_fetch_array($Consulta)) {
		$Fecha_Salida = $reg['Fecha_Salida'];
		$Hora_Salida = $reg['Hora_Salida'];
	}

	$fecha = date($Fecha_Salida." ".$Hora_Salida);
	$nueva_fecha48 = strtotime('-48 hour', strtotime($fecha));
	$nueva_fecha48 = date('Y-m-d H:i:s', $nueva_fecha48);
	$nueva_fecha2 = strtotime('-2 hour', strtotime($fecha));
	$nueva_fecha2 = date('Y-m-d H:i:s', $nueva_fecha2);
	$fecha_actual = date('Y-m-d H:i:s');

	echo "<br> fecha de salida del avion: ".$fecha;
	echo "<br> Nueva fecha 48hs antes: ".$nueva_fecha48;
	echo "<br> Nueva fecha 2hs antes: ".$nueva_fecha2;
	echo "<br>".$fecha_actual;

	if ($fecha_actual <= $nueva_fecha48 && $fecha_actual >= $nueva_fecha2 ) {
		echo "<br>Podes Realizar tu check-in";
	}else {
		echo "<br>El check-in se habilita solo de 48hs a 2hs antes del horario de vuelo";
	}


?>
