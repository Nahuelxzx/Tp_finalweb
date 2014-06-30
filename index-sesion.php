<?php
//LEVANTO LOS DATOS CON POST Y LLAMO A INICIO SESION DONDE COMPARO LOS DATOS.
echo "BIENVENIDO 1";
require_once "Conexion/estructuraConsulta.php";

if ( (isset($_POST['email'])) && (isset($_POST['password']) ))
	{
		//$nombre_ingresado = $_POST['email'];
		//$password_ingresado = $_POST['password'];	
		include "archivos/inicio_Sesion.php";
	}

	$nombre_ingresado = $_POST['loginform/email'];
	$password_ingresado = $_POST['password'];

	$consulta_Usuario = new estructuraModelo();
	$miUsuario = $consulta_Usuario->get_sql('Select nombre,password from administrador order by nombre');

	//Traer por post los valores introducidos en los campos de usuario y contraseña del Form(falta)
	foreach ($miUsuario as $row)
	{
		$usuario = $row['nombre'];
		$password = $row['password'];
		$ahora = date("Y-n-j H:i:s");
		$_SESSION["ultimoAcceso"] = $ahora;
	}
	
	echo "$nombre_ingresado";
	echo "$password_ingresado";
	echo "$usuario";
	echo "password";
	if($usuario==$nombre_ingresado && $password==$password_ingresado)
	{
		//Iniciamos las variables de sesion
		session_start();
		$_SESSION['nombre_usuario'] = $usuario;
		$_SESSION['password_usuario'] = $password;
		$fechaGuardada = $_SESSION["ultimoAcceso"]; 
		$ahora = date("Y-n-j H:i:s");
		echo "Bienvenido" . $usuario . "Su ultimo ingreso fue: " . $_SESSION['ultimoAcceso'];
	}
	//
	/*$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada)); 

	if($tiempo_transcurrido >= 600)
	{
	   require "cierre_Sesion.php";
	}
	else{$_SESSION["ultimoAcceso"] = $ahora;}*/

/* liberar la serie de resultados */
//$miUsuario->free();

/* cerrar la conexión */
//$consulta_Usuario->close();
?>
<script>
/*	window.onload = function(){killerSession();}
//El valor esta en milisegundos representa 15 o 600000 diez minutos.
function killerSession(){
		setTimeout("window.open('cierre_Sesion.php','_top');",900000);
	}*/
</script>