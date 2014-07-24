<?php
// include_once ('Conexion/estructuraConsulta.php');
 require_once ('jpgraph/src/jpgraph.php'); 
 require_once ('jpgraph/src/jpgraph_pie.php');
 require_once ('jpgraph/src/jpgraph_pie3d.php');
 
//// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', 'nahuel')
    or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('tp_finalweb2') or die('No se pudo seleccionar la base de datos');

$query = "SELECT count(pj.idpasaje) as cantidad from pasaje pj where habilitado = 'no' ";
$query2 = "SELECT count(pj.idpasaje) as cantidad from pasaje pj where habilitado = 'si' ";

$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());

//economy
while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
{			
	$data1y = $line['cantidad'];	
}

//ciudad
while ($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
{
	$data2y = $line2['cantidad'];	
}

//$datos =array($num,$num2);
$datos = array($data1y,$data2y);
//$labels = array("pepe","juanita","Maria","Luis");
$labels = array("Sin pagar","Sin check-in");
$grafico = new PieGraph(500, 400, 'auto');
$grafico->img->SetAntiAliasing();
$grafico->SetMarginColor("gray");


$grafico->title->Set("Reservas no concretadas");

$sp1 = new PiePlot3D($datos);
$sp1->SetSize(0.35);
$sp1->SetCenter(0.5);
$sp1->value->SetFont(FF_FONT1,FS_BOLD);
$sp1->value->SetColor("black");
$sp1->SetLabelPos(0.2);

$sp1->SetLegends($labels);

$sp1->ExplodeAll();

$grafico->Add($sp1);
$grafico->Stroke();
//echo "<img src='grafico_tarta.php' alt='' border = '0'>";
?>
