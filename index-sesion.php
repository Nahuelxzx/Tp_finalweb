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