<?php

$diasvuelos = $estructuraConsulta->get_sql('Select Dia_vuelo from vuelo V1 inner join aeropuerto A1
on V1.Aepto_Origen = A1.idAepto inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto
where A1.Ciudad = "' . $var2 . '" and A2.Ciudad = "' . $var1 . '" ');

//Cheque cuales son los dias que hace ese vuelo en la semana seguen el binario//
//****************************************************************************//							
//$bin = array();						
if($diasvuelos)
{	
	//echo "Hay resultados";
	foreach ($diasvuelos as $row)
	 {									
		$bin = $row['Dia_vuelo'];									
		if (count($bin) <= 0) {															
								$bin='0000000';
	 						  }
		//Dentro del include se hacen las comparaciones dia a dia segun el binario entregado//
		//---------------------------------------------------------------------------------//
	 	$vengodevuelta = 1;															   
		include "archivos/diasVuelo.php";
	 }
		 //Si la fecha que selecciono posee algun vuelo realizo la consulta para mostrar el vuelo segun los horarios//
		//---------------------------------------------------------------------------------------------------//
		if (($arraydia[$pos]) == ($arraybinarios[$pos]))
		{							
			//echo "</br><h1>ESTE VUELO TIENE SALIDAS ESA FECHA SELECCIONE GRACIAS AIREXPRESS.COM</H1>";
			$clientes = $estructuraConsulta->get_sql('select A1.Ciudad as CiudadOrigen, A2.Ciudad as CiudadDestino,
			V1.Hora_Salida as HoraSalida, V1.Hora_Llegada as HoraLlegada, TA.Precio_Economy as PrecioEconomico , TA.Precio_Primary as Precio_Primary from vuelo V1 inner join aeropuerto A1
			on V1.Aepto_Origen = A1.idAepto inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto inner join tarifa TA on V1.Aepto_Destino = TA.Aepto_Destino and V1.Aepto_Origen = TA.Aepto_Origen
			where A1.Ciudad = "' . $var1 . '" and A2.Ciudad = "' . $var2 . '" ');								
			//----------------//INICIO DE LA TABLA DE RESULTADOS//----------------------//
			echo "</br><table border='1' rules=all>\n";	
			echo "<tr><td>Ciudad Origen</td><td>Ciudad Destino</td><td>Hora Salida</td><td>Hora Llegada</td><td>Avion</td><td>Importe</td></tr>";							

			foreach ($clientes as $row)
			 {					            
	           	  echo "<ul><label><li><input type='radio' name='i1'></li><li> Sale:\t " . $row['CiudadOrigen'] . "</li><li> Llega: \t" . $row['CiudadOrigen'] . " </li><li> TiempoViaje </li><li> Directo </li><li> LineaAvion </li></label></ul> ";
	 	   		  echo "\t<tr>\n";							 	   		  
	              echo "<td>\t" . $row['CiudadOrigen'] . "</td>";
	              echo "<td>\t\n" . $row['CiudadDestino'] . "</td>";							             
	              echo "<td>" . $row['HoraSalida'] . "</td>";
	              echo "<td>" . $row['HoraLlegada'] . "</td>";
	              if ($clase == "primera")
	              {
	              	echo "<td>" . $row['Precio_Primary'] . "</td>";
	              }
	              else{echo "<td>" . $row['PrecioEconomico'] . "</td>";}							             	 	   		 
	 	   		  echo "\t</tr>\n";
			 }

			echo "</table>\n";
			echo "<br><br>";
		}
		else 
		{
			echo "</br><h3>ESTE VUELO NO TIENE SALIDAS ESA FECHA SELECCIONE OTRA POR FAVOR MUCHAS GRACIAS AIREXPRESS.COM</h3>";
		}
}
else
{
	echo "No hay resultados para ese vuelo";								
}		
?>			