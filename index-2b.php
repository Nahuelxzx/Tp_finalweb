<?php
//LLAMAR A LA CONEXION
require_once "Conexion/estructuraConsulta.php";
$ConsultaPasajeros = new estructuraModelo();

$pasajero1 = $ConsultaPasajeros->get_sql('Select Aori.Ciudad as CiudadOrigen, ADES.Ciudad as CiudadDestino, PJ.claveAuto as Clave, V1.idVuelo as NroVuelo , 
PJ.categoria as Categoria, PJ.asiento as NroAsiento, PRO.Nombre as Nombre , PRO.apellido as Apellido , PJ.fecha_salida as FechaSalida
FROM pasaje PJ inner join pasajero PRO on PJ.idPasajero = PRO.idPasajero inner join vuelo V1 on PJ.nroVuelo = V1.idVuelo
inner join aeropuerto AORI on V1.Aepto_Origen = AORI.idAepto inner join aeropuerto ADES on V1.Aepto_Destino = ADES.idAepto where PJ.claveAuto ="XXXXXX"	');

//LLAMAR A CLASE PASAJE//
//********************//
require_once "archivos/ClasePasaje.php";
$datosPasajero = new pasaje($pasajero1);

$aOrigen = $datosPasajero->getAeptoOrigen();
$aDestino = $datosPasajero->getAeptoDestino();
$nombre = $datosPasajero->getNombre();
$apellido = $datosPasajero->getApellido();
$clave =$datosPasajero->getClaveAuto();
$Nvuelo= $datosPasajero->getNroVuelo();
$cat = $datosPasajero->getCategoria();
$asiento = $datosPasajero->getAsiento();
$fecha = $datosPasajero->getFecha();	

/*echo $nombre;
echo $apellido;
echo $aOrigen;
echo "$aDestino";
echo "<br>$clave";
echo "$Nvuelo";
echo "$cat";
echo "$asiento";
echo "$fecha";*/
//PREPARAR TODO PARA EL PDF SEÑORES

//LLAMAR AL PDF

//CERRAR TODITO
?>