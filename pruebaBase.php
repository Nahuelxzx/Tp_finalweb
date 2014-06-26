<?php
	// Conectando, seleccionando la base de datos
	$link = mysql_connect('localhost', 'root', '')
	    or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('tp_finalweb2') or die('No se pudo seleccionar la base de datos');

	// Realizar una consulta MySQL
	$query = 'SELECT Ciudad FROM aeropuerto';
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

	// Imprimir los resultados en HTML
	
	$ciudad = array();

	while ($line = mysql_fetch_array( $result )) {
			
	    foreach ($line as $col_value) {
	        $ciudad[] = $col_value;
	    }
	    	
	}

	// Liberar resultados
	mysql_free_result($result);

	// Cerrar la conexión
	mysql_close($link);

	echo json_encode($ciudad);
?>