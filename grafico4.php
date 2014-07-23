<?php // content="text/plain; charset=utf-8"
	require_once ('jpgraph/src/jpgraph.php');
	require_once ('jpgraph/src/jpgraph_bar.php');

	$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
	//echo 'Connected successfully';
	mysql_select_db('tp_finalweb2') or die('No se pudo seleccionar la base de datos');

		$query = " SELECT aed.Ciudad as ciudad ,pj.categoria as categoria, count(*) as cantidad
			from pasaje pj inner join vuelo v on pj.nrovuelo = v.idvuelo
			inner join aeropuerto aeo on v.Aepto_Origen = aeo.idAepto
			inner join aeropuerto aed on v.Aepto_Destino = aed.idAepto
			where pj.habilitado='si' and pj.categoria = 'economy'
			group by aed.ciudad,pj.categoria ";

		$query2 = " SELECT aed.Ciudad as ciudad ,count(*) as cantidad
			from pasaje pj inner join vuelo v on pj.nrovuelo = v.idvuelo
			inner join aeropuerto aeo on v.Aepto_Origen = aeo.idAepto
			inner join aeropuerto aed on v.Aepto_Destino = aed.idAepto
			where pj.habilitado='si'
			group by aed.ciudad order by aed.Ciudad asc ";

		$query3 = " SELECT aed.Ciudad as ciudad ,pj.categoria as categoria, count(*) as cantidad
			from pasaje pj inner join vuelo v on pj.nrovuelo = v.idvuelo
			inner join aeropuerto aeo on v.Aepto_Origen = aeo.idAepto
			inner join aeropuerto aed on v.Aepto_Destino = aed.idAepto
			where pj.habilitado='si' and pj.categoria = 'primera'
			group by aed.ciudad,pj.categoria ";

		//$query3 = " SELECT count(pj.categoria) from pasaje pj where pj.categoria = 'economy' " ;	

		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
		$result3 = mysql_query($query3) or die('Consulta fallida: ' . mysql_error());
		//$result3 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());

		$i=0;//economy
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

		$b=0;//primera
		while ($line3 = mysql_fetch_array($result3, MYSQL_ASSOC))
		{
			$data2y[$b] = $line3['cantidad'];
			$b++;
		}

	//$data1y=array(47,80,40,116);		
	//$data2y=array(61,30,82,105);
	//$data2y=array(12,18);
	//$data3y=array(115,50,70,93);

	// Create the graph. These two calls are always required
	$graph = new Graph(350,200,'auto');
	$graph->SetScale("textlin");

	$theme_class=new UniversalTheme;
	$graph->SetTheme($theme_class);

	$graph->yaxis->SetTickPositions(array(5,10,15,30));
	$graph->SetBox(false);

	$graph->ygrid->SetFill(false);
	$graph->xaxis->SetTickLabels($ciudad1);
	//$graph->xaxis->SetTickLabels(array('A','B','C','D'));

	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);

	// Create the bar plots
	$b1plot = new BarPlot($data1y); //cantidad economy
	$b2plot = new BarPlot($data2y); //cantidad primera
	//$b3plot = new BarPlot($data3y);

	// Create the grouped bar plot
	$gbplot = new GroupBarPlot(array($b1plot,$b2plot));
	// ...and add it to the graPH
	$graph->Add($gbplot);

	$b1plot->SetColor("white");
	$b1plot->SetFillColor("#cc1111");
	$b1plot->SetLegend("Economy");

	$b2plot->SetColor("white");
	$b2plot->SetFillColor("#11cccc");
	$b2plot->SetLegend("Primera");

	//$b3plot->SetColor("white");
	//$b3plot->SetFillColor("#1111cc");

	$graph->title->Set("Pasajes vendidos por categoría y por destino");

	// Display the graph
	$graph->Stroke();
?>