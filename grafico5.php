<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
	require_once ('jpgraph/src/jpgraph_bar.php');

	$link = mysql_connect('localhost', 'root', 'nahuel')
    or die('No se pudo conectar: ' . mysql_error());
	//echo 'Connected successfully';
	mysql_select_db('tp_finalweb2') or die('No se pudo seleccionar la base de datos');
		//cantidades
		$query = " SELECT count(*) cantidad
					from pasaje pj inner join vuelo v1 on pj.nroVuelo = v1.idVuelo inner join avion av on v1.idAvion = av.idAvion inner join aeropuerto aed on v1.Aepto_Destino = aed.idAepto
					where pj.habilitado = 'si' and av.tipo = 1
					group by av.Tipo , aed.Ciudad ";		
		//ciudades
		$query2 = " SELECT aed.Ciudad as ciudad
			from pasaje pj inner join vuelo v1 on pj.nroVuelo = v1.idVuelo inner join avion av on v1.idAvion = av.idAvion inner join aeropuerto aed on v1.Aepto_Destino = aed.idAepto
			where pj.habilitado = 'si'
			group by av.Tipo , aed.Ciudad ";

		$query3 = " SELECT count(*) cantidad
					from pasaje pj inner join vuelo v1 on pj.nroVuelo = v1.idVuelo inner join avion av on v1.idAvion = av.idAvion inner join aeropuerto aed on v1.Aepto_Destino = aed.idAepto
					where pj.habilitado = 'si' and av.tipo = 2
					group by av.Tipo , aed.Ciudad ";	

		$query4 = " SELECT av.tipo, aed.Ciudad ,count(*) cantidad, av.Modelo
					from pasaje pj inner join vuelo v1 on pj.nroVuelo = v1.idVuelo inner join avion av on v1.idAvion = av.idAvion inner join aeropuerto aed on v1.Aepto_Destino = aed.idAepto
					where pj.habilitado = 'si' and av.tipo = 3
					group by av.Tipo , aed.Ciudad; ";

		$query5 = " SELECT count(*) cantidad
					from pasaje pj inner join vuelo v1 on pj.nroVuelo = v1.idVuelo inner join avion av on v1.idAvion = av.idAvion inner join aeropuerto aed on v1.Aepto_Destino = aed.idAepto
					where pj.habilitado = 'si' and av.tipo = 4
					group by av.Tipo , aed.Ciudad ";		

		//$query3 = " SELECT count(pj.categoria) from pasaje pj where pj.categoria = 'economy' " ;	

		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
		$result3 = mysql_query($query3) or die('Consulta fallida: ' . mysql_error());
		$result4 = mysql_query($query3) or die('Consulta fallida: ' . mysql_error());
		$result5 = mysql_query($query3) or die('Consulta fallida: ' . mysql_error());
		//$result3 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());

		$i=0;//cantidades 1
		while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
		{			
			$data1y[$i] = $line['cantidad'];
			$i++;
		}

		$a=0;//ciudad
		while ($line2 = mysql_fetch_array($result2, MYSQL_ASSOC))
		{
			$ciudad1[$a] = $line2['ciudad'];			
			$a++;
		}

		$b=0;//cantidad 3
		while ($line3 = mysql_fetch_array($result3, MYSQL_ASSOC))
		{
			if ($line3) {
				$data2y[$b] = $line3['cantidad'];
				$b++;
			}
			else{
				$data2y=array(12,18);
			}
			
		}

		$c=0;//cantidades 4
		while ($line4 = mysql_fetch_array($result4, MYSQL_ASSOC))
		{			
			$data3y[$c] = $line4['cantidad'];
			$i++;
		}

		$d=0;//cantidades 5
		while ($line5 = mysql_fetch_array($result5, MYSQL_ASSOC))
		{			
			$data4y[$d] = $line5['cantidad'];
			$i++;
		}

		/*if (count($data2y[])<=0) {
			$data2y[]=array(2,2,2);
		}*/
	//$data1y=array(47,80,40,116);		
	//$data2y=array(61,30,82,105);
	//$data2y=array(12,18);
	//$data3y=array(115,50,70,93);

	// Create the graph. These two calls are always required
	$graph = new Graph(500,500,'auto');
	$graph->SetScale("textlin");

	$theme_class=new UniversalTheme;
	$graph->SetTheme($theme_class);

	$graph->yaxis->SetTickPositions(array(5,10,15,30,50));
	$graph->SetBox(false);

	$graph->ygrid->SetFill(false);
	$graph->xaxis->SetTickLabels($ciudad1); //Ciudades
	//$graph->xaxis->SetTickLabels(array('A','B','C','D'));

	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);

	// Create the bar plots
	$b1plot = new BarPlot($data1y); //tipo avion 1
	$b2plot = new BarPlot($data2y); //tipo avion 2
	$b3plot = new BarPlot($data3y); //tipo avion 3
	$b4plot = new BarPlot($data4y); //tipo avion 4	

	// Create the grouped bar plot
	$gbplot = new GroupBarPlot(array($b1plot,$b2plot,$b3plot,$b4plot));
	// ...and add it to the graPH
	$graph->Add($gbplot);

	$b1plot->SetColor("white");
	$b1plot->SetFillColor("#cc1111");
	$b1plot->SetLegend("Tipo 1");

	$b2plot->SetColor("red");
	$b2plot->SetFillColor("#11cccc");
	$b2plot->SetLegend("Tipo 2");

	$b3plot->SetColor("black");
	$b3plot->SetFillColor("#11cccc");
	$b3plot->SetLegend("Tipo 3");

	$b4plot->SetColor("blue");
	$b4plot->SetFillColor("#11cccc");
	$b4plot->SetLegend("Tipo 4");

	//$b3plot->SetColor("white");
	//$b3plot->SetFillColor("#1111cc");

	$graph->title->Set("Pasajes vendidos por Tipo avion y destino");

	// Display the graph
	$graph->Stroke();
?>