
<?php
$estructuraConsulta = new estructuraModelo();

$_SESSION['origen'] = $_POST['Origen'];
$_SESSION['destino'] = $_POST['destino'];

$var1 = $_POST['Origen'];
$var2 = $_POST['destino'];			

//Hago la primer consulta para saber que dias sale el vuelo y ver sin coincide con la seleccionada//
//************************************************************************************************//
$diasvuelos = $estructuraConsulta->get_sql('SELECT Dia_vuelo FROM vuelo V1 INNER JOIN aeropuerto A1
ON V1.Aepto_Origen = A1.idAepto INNER JOIN aeropuerto A2 ON V1.Aepto_Destino = A2.idAepto
WHERE A1.Ciudad = "'.$var1.'" and A2.Ciudad = "'.$var2.'" ');

//Cheque cuales son los dias que hace ese vuelo en la semana seguen el binario//
//****************************************************************************//							
//$bin = array();						
echo "<br>";
echo "<div class='marker'><strong> IDA </strong></div>";

//echo $_POST['fechap'];
//echo $_POST['fechar'];
$varFecha1 = $_POST['fechap'];

if($diasvuelos){	
	//echo "Hay resultados";
	foreach ($diasvuelos as $row){									
		$bin = $row['Dia_vuelo'];									
		if (count($bin) <= 0) {															
			$bin='0000000';
		}
		//Dentro del include se hacen las comparaciones dia a dia segun el binario entregado//
		//---------------------------------------------------------------------------------//
		$vengodevuelo = 0;													   
		include "archivos/diasVuelo.php";
	}
		 //Si la fecha que selecciono posee algun vuelo realizo la consulta para mostrar el vuelo segun los horarios//
		//---------------------------------------------------------------------------------------------------//
		if (($arraydia[$pos]) == ($arraybinarios[$pos])){							
			//echo "</br><h1>ESTE VUELO TIENE SALIDAS ESA FECHA SELECCIONE GRACIAS AIREXPRESS.COM</H1>";
			$clientes = $estructuraConsulta->get_sql('SELECT V1.idVuelo as id_vuelo, A1.Ciudad as CiudadOrigen, A2.Ciudad as CiudadDestino,
			V1.Hora_Salida as HoraSalida, V1.Hora_Llegada as HoraLlegada, TA.Precio_Economy as PrecioEconomico , TA.Precio_Primary as Precio_Primary from vuelo V1 inner join aeropuerto A1
			on V1.Aepto_Origen = A1.idAepto inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto inner join tarifa TA on V1.Aepto_Destino = TA.Aepto_Destino and V1.Aepto_Origen = TA.Aepto_Origen
			where A1.Ciudad = "' . $var1 . '" and A2.Ciudad = "' . $var2 . '" ');								
			//----------------//INICIO DE LA TABLA DE RESULTADOS//----------------------//
			echo "</br><table border='1' rules=all>";
			echo "<tr height=40px><td></td><td width=350px><strong> ORIGEN </strong></td><td width=350px><strong> DESTINO </strong></td><td width=100px><strong> SALIDA </strong></td><td width=100px><strong> LLEGADA </strong></td><td width=100px><strong>CATEG.</strong></td><td width=100px><strong> IMPORTE </strong></td></tr>";

			foreach ($clientes as $row){				            	   
	 	   		  echo "<tr height=40px>";
	 	   		  echo "<td><input type='radio' name='ida_vuelo' value='".$row['id_vuelo']."'></td>";					 	   		  
	              echo "<td>" . $row['CiudadOrigen'] . "</td>";
	              echo "<td>" . $row['CiudadDestino'] . "</td>";							             
	              echo "<td>" . $row['HoraSalida'] . "</td>";
	              echo "<td>" . $row['HoraLlegada'] . "</td>";

	              if ($clase == "primera"){
	              	echo "<td>Primera</td>";	
	              	echo "<td>" . $row['Precio_Primary'] . "</td>";
	              }else {
	              	echo "<td>Economica</td>";	
	              	echo "<td>" . $row['PrecioEconomico'] . "</td>";
	              }							             	 	   		 
	 	   		  echo "</tr>";
			}
			echo "</table>";
			echo "<br><br>";
		}else {
			echo "</br><h3>ESTE VUELO NO TIENE SALIDAS ESA FECHA SELECCIONE OTRA POR FAVOR MUCHAS GRACIAS AIREXPRESS.COM</h3>";
		}
}else {
	echo "No hay resultados para ese vuelo";			
}		
?>