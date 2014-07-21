<?php
// Conectando, seleccionando la base de datos
include_once('conexion/config.php');

$link = mysql_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
    or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db(DB_NAME) or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
//$query = "SELECT count(*) as ventas from pasaje where habilitado='si' ";
$query = "SELECT fecha_salida from pasaje group by fecha_salida";

$query2 = " SELECT  count(*) as cantidad
			from pasaje pj
			where pj.habilitado ='si' and pj.Fecha_Salida between '2014-07-10' and '2014-07-21'
			group by pj.Fecha_Salida "; 

$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

//$arreglo1 = mysql_fetch_array($result);

//var_dump($arreglo1);

echo "<br>parte 2<br><h2>555";

$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());

//$arreglo2 = mysql_fetch_array($result2);

//var_dump($arreglo2);

echo "</h2>";
//var_dump($result);
// Imprimir los resultados en HTML
//$datos=array();
echo "<table>\n";
while ($line = mysql_fetch_array($result2, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
       			 echo "\t\t<td>$col_value</td>\n";        
   				 echo "\t</tr>\n";
				   				}
				   										}
echo "</table>\n";
//var_dump($datos);

// Liberar resultados
//mysql_free_result($result);

// Cerrar la conexión
//mysql_close($link);
?>