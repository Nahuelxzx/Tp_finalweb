<?php
	session_start();
	unset($_SESSION["nombre_usuario"]);
	unset($_SESSION["password_usuario"]);
	session_destroy();
	header("Location: index.php");
	exit();
?>