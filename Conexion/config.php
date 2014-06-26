<?php

	$matriz = parse_ini_file("conf.ini");

	$hos=$matriz['hostname'];
	$usr=$matriz['usuario'];
	$pass=$matriz['password'];
	$dbname=$matriz['dbname'];


	define("DB_HOST",$hos); //Direccion de la base de datos
	define("DB_USER", $usr);	//Nombre de usuario de la base
	define("DB_PASS", $pass); //Password de la base	
	define("DB_NAME",$dbname); //Nombre de la base
	define("DB_CHARSET", "utf-8"); //para los juegos de caracteres

	//print_r($matriz);

?>

