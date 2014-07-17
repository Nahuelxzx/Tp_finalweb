<?php

 require_once ('jpgraph/src/jpgraph.php');
 require_once ('jpgraph/src/jpgraph_bar.php');
 
 /*require_once "Conexion/estructuraConsulta.php";
$ConsultaPasajeros = new estructuraModelo();

$pasajero1 = $ConsultaPasajeros->get_sql


 //Consulta
$resultado=$mysqli->query("SELECT users.nombre,horas.horas from users, horas where users.id=horas.id_usuario");

//arreglos donde se guardaran los resultados de la consulta.
$usuarios=array();
$horas=array();

//Recorre el resultado de la consulta y los almacena en los arreglos
while($row=$resultado->fetch_assoc()){
   $usuarios[]=$row['nombre'];
   $horas[]=$row['horas'];
}

$grafico->xaxis->SetTickLabels($labes);
  remplazar por:  $grafico->xaxis->SetTickLabels($usuarios);

$barplot1 =new BarPlot($datos); 
remplazar por: $barplot1 =new BarPlot($horas);

//Conexion a la base de datos
 //$mysqli= new mysqli("localhost","root", "", "usuarios");

 //if($mysqli->connect_errno){

   // echo "Fallo al conectar a MySQL:(". $mysqli->connect_errno.")". $mysqli->connect_errno;
//}
*/
// Creamos el grafico

$datos=array(6,5,8,6);
$labels=array("pepe","juanita","Maria","Luis");

$grafico = new Graph(500, 400, 'auto');
$grafico->SetScale("textint");
$grafico->title->Set("Ejemplo de Grafica");
$grafico->xaxis->title->Set("Trabajadores");
$grafico->xaxis->SetTickLabels($labels);
$grafico->yaxis->title->Set("Horas Trabajadas");
$barplot1 =new BarPlot($datos);

// Un gradiente Horizontal de morados
$barplot1->SetFillGradient("#BE81F7", "#E3CEF6", GRAD_HOR);

// 30 pixeles de ancho para cada barra
$barplot1->SetWidth(30);
$grafico->Add($barplot1);
$grafico->Stroke();



?>
