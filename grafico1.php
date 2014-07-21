<?php

//include_once('conexion/config.php');

/*$link = mysql_connect('localhost','root','nahuel') or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('tp_finalweb2') or die('No se pudo seleccionar la base de datos');*/

 require_once ('jpgraph/src/jpgraph.php');
 require_once ('jpgraph/src/jpgraph_bar.php');
 
 
/*$link = mysql_connect('localhost','root','root','tp_finalweb2') or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('tp_finalweb2') or die('No se pudo seleccionar la base de datos');*/

/*$link = mysql_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
    or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db(DB_NAME) or die('No se pudo seleccionar la base de datos');*/

// Realizar una consulta MySQL
//$query = "SELECT count(*) as ventas from pasaje where habilitado='si' ";
/*
$query = "SELECT fecha_salida from pasaje group by fecha_salida";

$query2 = " SELECT  count(*) as cantidad
			from pasaje pj
			where pj.habilitado ='si' and pj.Fecha_Salida between '2014-07-10' and '2014-07-21'
			group by pj.Fecha_Salida "; 

$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$arreglo1 = mysql_fetch_array($result);

//var_dump($arreglo1);

echo "<br>parte 2<br><h2>555";

$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());

$arreglo2 = mysql_fetch_array($result2);

*/

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
