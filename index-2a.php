<?php
	session_start();

	for ($i= 1; $i <= $_SESSION['adultos'] ; $i++){
		$apAdul = $_POST['appAdul'.$i];
		$nomAdul = $_POST['nomAdul'.$i];
		$sexAdul = $_POST['sexAdul'.$i];
		$tdniAdul = $_POST['tipodniAdul'.$i];
		$dninumAdul = $_POST['dninumAdul'.$i];

	require_once "Conexion/estructuraConsulta.php";

	$Consulta3 = new estructuraModelo();

	$diasvuelos1 = $Consulta3->get_sql_in("INSERT INTO pasajero (Nombre, Apellido, Tipo_doc, Dni, Email) VALUES ('".$nomAdul."','".$apAdul."','".$tdniAdul."','".$dninumAdul."','".$emailAdul."')");
	
	echo "<br><br>";
	echo "Datos Pasajero ".$i." : ".$apAdul." ".$nomAdul." ".$sexAdul." ".$tdniAdul." ".$dninumAdul;
	echo "<br><br>";

	}

	for ($i= 1; $i <= $_SESSION['menores'] ; $i++){
		$apMen = $_POST['appMen'.$i];
		$nomMen = $_POST['nomMen'.$i];
		$sexMen = $_POST['sexMen'.$i];
		$tdniMen = $_POST['tipodniMen'.$i];
		$dninumMen = $_POST['dninumMen'.$i];

	$diasvuelos1 = $Consulta3->get_sql_in("INSERT INTO pasajero (Nombre, Apellido, Tipo_doc, Dni, Email) VALUES ('".$nomMen."','".$apMen."','".$tdniMen."','".$dninumMen."','".$emailMen."')");
	
	echo "<br><br>";
	echo "Datos Pasajero ".$i." : ".$apMen." ".$nomMen." ".$sexMen." ".$tdniMen." ".$dninumMen;
	echo "<br><br>";
	
	}

	$cuota = $_POST['cuota'];
	$tarjeta = $_POST['tarjeta'];
	$numTarj = $_POST['numTarj'];
	$vence = $_POST['vence'];
	$tdniTit = $_POST['tipodniTit'];
	$dninumTit = $_POST['numdniTit'];
	$sexTit = $_POST['sexTit'];
	$email = $_POST['email'];
	$remail = $_POST['remail'];

	
	echo "<br><br>";
	echo "mis datos: ".$apAdul." ".$nomAdul." ".$sexAdul." ".$tdniAdul." ".$dninumAdul;
	echo "<br><br>";
	echo "Formas de Pago: ".$cuota." ".$tarjeta." ".$numTarj." ".$vence." ".$tdniTit." ".$dninumTit." ".$sexTit." ".$email." ".$remail;
	echo "<br><br>";

?>