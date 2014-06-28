<?php
$estructuraConsulta = new estructuraModelo();
							$var1 = $_POST['Origen'];
							$var2 = $_POST['destino'];

							//Hago la primer consulta para saber que dias sale el vuelo y ver sin coincide con la seleccionada//
							//************************************************************************************************//
							$diasvuelos = $estructuraConsulta->get_sql('Select Dia_vuelo from vuelo V1 inner join aeropuerto A1
							on V1.Aepto_Origen = A1.idAepto inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto
							where A1.Ciudad = "' . $var1 . '" and A2.Ciudad = "' . $var2 . '" ');

							//Cheque cuales son los dias que hace ese vuelo en la semana seguen el binario//
							//****************************************************************************//							
							$bin = array();
							echo "Que hay en dias vuelos";
							var_dump($diasvuelos);
							if($diasvuelos)
							{	
								echo "Hay resultados";
								foreach ($diasvuelos as $row)
								 {
									echo "</br>DIAS DE VUELO BINARIO COMPLETO : " . $row['Dia_vuelo'];
									$bin = $row['Dia_vuelo'];
									var_dump($bin);
									if (count($bin) <= 0) {
											echo "PASE POR EL IF Y PUSE TODO EN 000000000";
											$bin='0000000';
													   }
									include "archivos/diasVuelo.php";
								 }
							}
							else
							{
								echo "No hay resultados";
								exit();
							}	 
							//Dentro del include se hacen las comparaciones dia a dia segun el binario entregado//
							//---------------------------------------------------------------------------------//
							//include "archivos/diasVuelo.php";

							//Si la fecha que selecciono posee algun vuelo realizo la consulta para mostrar el vuelo segun los horarios//
							//---------------------------------------------------------------------------------------------------//							
							
							if (($arraydia[$pos]) == ($arraybinarios[$pos]))
							{							
								echo "</br><h1>ESTE VUELO TIENE SALIDAS ESA FECHA SELECCIONE GRACIAS AIREXPRESS.COM</H1>";
								$clientes = $estructuraConsulta->get_sql('select A1.Ciudad as CiudadOrigen, A2.Ciudad as CiudadDestino,
								V1.Hora_Salida as HoraSalida, V1.Hora_Llegada as HoraLlegada from vuelo V1 inner join aeropuerto A1
								on V1.Aepto_Origen = A1.idAepto inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto
								where A1.Ciudad = "' . $var1 . '" and A2.Ciudad = "' . $var2 . '" ');								
								//----------------//INICIO DE LA TABLA DE RESULTADOS//----------------------//
								echo "</br><table border='1' rules=all>\n";	

								echo "<tr><td>Ciudad Origen</td><td>Ciudad Destino</td><td>Hora Salida</td><td>Hora Llegada</td><td>Avion</td><td>Importe</td></tr>";							

								foreach ($clientes as $row)
								 {
					            
					           	 echo "<ul><label><li><input type='radio' name='i1'></li><li> Sale:\t " . $row['CiudadOrigen'] . "</li><li> Llega: \t" . $row['CiudadOrigen'] . " </li><li> TiempoViaje </li><li> Directo </li><li> LineaAvion </li></label></ul> ";
					 	   		 echo "\t<tr>\n";
					 	   		 //echo "<td>" . $row['idVuelo'] . "</td>";
					             echo "<td>\t" . $row['CiudadOrigen'] . "</td>";
					             echo "<td>\t\n" . $row['CiudadDestino'] . "</td>";
					             //echo "<td>" . $row['CiudadDestino'] . "</td>";
					             //echo "<td>" . $row['Aepto_Destino'] . "</td>";
					             echo "<td>" . $row['HoraSalida'] . "</td>";
					             echo "<td>" . $row['HoraLlegada'] . "</td>";
					             //echo "<td>" . $row['Dia_vuelo'] . "</td>";
					             //echo "<td>" . $row['Fecha_Salida'] . "</td>";			 	   		 
					 	   		 echo "\t</tr>\n";
								 }

								echo "</table>\n";
								echo "<br><br>";
							}
						else 
						{
								echo "</br><h3>ESTE VUELO NO TIENE SALIDAS ESA FECHA SELECCIONE OTRA POR FAVOR MUCHAS GRACIAS AIREXPRESS.COM</h3>";
						}
?>