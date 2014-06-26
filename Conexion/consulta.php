// Imprimir los resultados en HTML

<?php

require_once "estructuraConsulta.php";

$estructuraConsulta = new estructuraModelo();
$clientes = $estructuraConsulta->get_sql('select A1.Ciudad as CiudadOrigen, A2.Ciudad as CiudadDestino from vuelo V1 inner join aeropuerto A1 on V1.Aepto_Origen = A1.idAepto inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto where A2.Provincia = "Neuquen" and A1.Provincia= "Chubut" and V1.Fecha_Salida = "2014-05-10" ');

echo "<table border='1' rules=all>\n";

//var_dump($clientes);
 echo "<tr><td>Ciudad Origen</td><td>Ciudad Destino</td><td>Apellido</td><td>Dni</td><td>Email</td><td>Sexo</td><td>Fecha de nacimiento</td></tr>";
 echo "<tr>Nombre</td>";
 var_dump($clientes);
foreach ($clientes as $row)
 {
            
 	   		 echo "\t<tr>\n";
 	   		 //echo "<td>" . $row['idVuelo'] . "</td>";
             echo "<td>" . $row['CiudadOrigen'] . "</td>";
             echo "<td>" . $row['CiudadDestino'] . "</td>";
             //echo "<td>" . $row['CiudadDestino'] . "</td>";

             //echo "<td>" . $row['Aepto_Destino'] . "</td>";
             //echo "<td>" . $row['Hora_Salida'] . "</td>";
             //echo "<td>" . $row['Hora_Llegada'] . "</td>";
             //echo "<td>" . $row['Dia_vuelo'] . "</td>";
             //echo "<td>" . $row['Fecha_Salida'] . "</td>";
 	   		 
 	   		 echo "\t</tr>\n";
 }

echo "</table>\n";

// Liberar resultados
  //mysql_free_result($result);

  // Cerrar la conexión
  //mysql_close($link);
?>
