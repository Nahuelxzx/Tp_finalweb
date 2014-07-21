<?php
 //include ('Conexion/estructuraConsulta.php');
 require_once ('jpgraph/src/jpgraph.php'); 
 require_once ('jpgraph/src/jpgraph_pie.php');
 require_once ('jpgraph/src/jpgraph_pie3d.php');

 

 /*$estructuraConsulta = new estructuraModelo();

 $diasvuelos = $estructuraConsulta->get_sql("select count(*) as ventas from pasaje where habilitado='si' ");
 //echo $diasvuelos["ventas"];
// printf("%s",$diasvuelos["ventas"]);
//var_dump($diasvuelos);
 foreach ($diasvuelos as $row){	
 	$num = $row['ventas'];
 }

 //echo "$num";

$diasvuelos2 = $estructuraConsulta->get_sql("select count(*) as ventas from pasaje where habilitado='no' ");
 //echo $diasvuelos["ventas"];
// printf("%s",$diasvuelos["ventas"]);
//var_dump($diasvuelos2);
 foreach ($diasvuelos2 as $row2){	
 	$num2 = $row2['ventas'];
 }*/

 /*while($row = mysql_fetch_array($diasvuelos))
    {
     $data[] = $row['ventas'];
     //$can[] = $row[1];
    } */
 //var_dump($diasvuelos);

//$grafico->xaxis->SetTickLabels($labes);  remplazar por:  $grafico->xaxis->SetTickLabels($usuarios);
//$datos =array($num,$num2);
$datos = array(1,2);
//$labels = array("pepe","juanita","Maria","Luis");
$labels = array("pepe","rosa");
$grafico = new PieGraph(500, 400, 'auto');
$grafico->img->SetAntiAliasing();
$grafico->SetMarginColor("gray");
//$grafico->title->Set("Ejemplo de Grafica");
//$grafico->xaxis->title->Set("Trabajadores");
//$grafico->xaxis->SetTickLabels($labels);
//$grafico->yaxis->title->Set("Horas Trabajadas");

$grafico->title->Set("Ejemplo: HOras trabajadas");

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
