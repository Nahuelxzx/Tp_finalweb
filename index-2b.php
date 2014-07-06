<?php
//LLAMAR A LA CONEXION
require_once "Conexion/estructuraConsulta.php";
$ConsultaPasajeros = new estructuraModelo();

$pasajero1 = $ConsultaPasajeros->get_sql('select * from pasajero where idPasajero = 1');

//LLAMAR A CLASE PASAJE
require_once "archivos/ClasePasaje.php";
$datosPasajero = new pasaje($pasajero1);

//$aOrigen = $datosPasajero->aeptoOrigen;
//$aDestino = $datosPasajero->aeptoDestino;
$nombre = $datosPasajero->getNombre();
$apellido = $datosPasajero->getApellido();

echo $nombre;

echo $apellido;

//PREPARAR TODO PARA EL PDF SEÑORES

//LLAMAR AL PDF

//CERRAR TODITO

?>