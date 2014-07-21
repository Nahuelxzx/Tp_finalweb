<?php // content="text/plain; charset=utf-8"
// Example for use of JpGraph,
//require_once ('../jpgraph.php');
//require_once ('../jpgraph_bar.php');

 require_once ('jpgraph/src/jpgraph.php');
 require_once ('jpgraph/src/jpgraph_bar.php');
 

//// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', 'nahuel')
    or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('tp_finalweb2') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
/*	
$query = 'SELECT AEPTO1.Aepto AS aeptoOrigen, 
				AEPTO2.Aepto AS aeptoDestino, 
				PJ.claveAuto AS Clave, 
				V1.idVuelo AS NroVuelo, 
				PJ.categoria AS Categoria, 
				PJ.asiento AS NroAsiento, 
				PRO.Nombre AS Nombre, 
				PRO.apellido AS Apellido, 
				PJ.fecha_salida AS FechaSalida, 
				V1.Hora_Salida AS Hora
				FROM pasaje PJ
				INNER JOIN pasajero PRO ON PJ.idPasajero = PRO.idPasajero
				INNER JOIN vuelo V1 ON PJ.nroVuelo = V1.idVuelo
				INNER JOIN aeropuerto AEPTO1 ON V1.Aepto_Origen = AEPTO1.idAepto
				INNER JOIN aeropuerto AEPTO2 ON V1.Aepto_Destino = AEPTO2.idAepto
				WHERE PJ.claveAuto =  "XXXXXX"';

*/

//$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "SELECT fecha_salida from pasaje group by fecha_salida";

$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

//$arreglo1 = mysql_fetch_array($result);
$datax = mysql_fetch_array($result);

//var_dump($datax);

/*while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    
$origen = $line['aeptoOrigen'];
$destino = $line['aeptoDestino'];
$clave = $line['Clave'];
$vuelo = $line['NroVuelo'];
$categoria = $line['Categoria'];
$asiento = $line['NroAsiento'];
$apellido = $line['Apellido'];
$nombre = $line['Nombre'];
$fecha = $line['FechaSalida'];
$hora = $line['Hora'];
   
   
}  
*/	
// We need some data
$datay=array(0.13,0.25,0.21,0.35,0.31,0.06);
//$datax=array("$hora","$nombre","March","April","May","June");
//$datax=array("$hora","$nombre","March","April","May","June");

// Setup the graph.
$graph = new Graph(400,240);
$graph->img->SetMargin(60,20,35,75);
$graph->SetScale("textlin");
$graph->SetMarginColor("lightblue:1.1");
$graph->SetShadow();

// Set up the title for the graph
$graph->title->Set("Bar gradient with left reflection");
$graph->title->SetMargin(8);
$graph->title->SetFont(FF_VERDANA,FS_BOLD,12);
$graph->title->SetColor("darkred");

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,10);
$graph->yaxis->SetFont(FF_VERDANA,FS_NORMAL,10);

// Show 0 label on Y-axis (default is not to show)
$graph->yscale->ticks->SupressZeroLabel(false);

// Setup X-axis labels
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetLabelAngle(50);

// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.6);

// Setup color for gradient fill style
$bplot->SetFillGradient("navy:0.9","navy:1.85",GRAD_LEFT_REFLECTION);

// Set color for the frame of each bar
$bplot->SetColor("white");
$graph->Add($bplot);

// Finally send the graph to the browser
$graph->Stroke();
?>