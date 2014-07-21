<?php
session_start();
$clave=$_SESSION['codigo_reserva'];
/**
 * HTML2PDF Librairy - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @author      Laurent MINGUET <webmaster@html2pdf.fr>
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */

  // Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', '')
    or die('No se pudo conectar: ' . mysql_error());
//echo 'Connected successfully';
mysql_select_db('tp_finalweb2') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL
$query = 'SELECT AEPTO1.Ciudad as Origen, 
				AEPTO2.Ciudad as Destino,
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
				WHERE PJ.claveAuto =  "'.$clave.'"';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
$varg= array();

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    
   
        
       //echo "\t\t".$line['idPasajero']."\n";
       // echo "\t\t".$line['Nombre']."\n";
       // echo "\t\t".$line['Apellido']."\n";
		// echo "\t\t".$line['Fec_Nac']."\n";
       // echo "\t\t".$line['Dni']."\n";
       // echo "\t\t".$line['Tipo_doc']."\n";
		// echo "\t\t".$line['Email']."\n";
		//$varg=$col_value['Nombre'];
        //."2".$col_value['Nombre']."3".$col_value['Apellido'];
    
//var_dump($varg);
//var_dump($col_value);
//echo "$varg";
$origen = $line['Origen'];
$destino = $line['Destino'];
$clave = $line['Clave'];
$vuelo = $line['NroVuelo'];
$categoria = $line['Categoria'];
$asiento = $line['NroAsiento'];
$apellido = $line['Apellido'];
$nombre = $line['Nombre'];
$fecha = $line['FechaSalida'];
$hora = $line['Hora'];
   

   //echo"$var1";
   
}  
	
	// get the HTML
    ob_start();
     $msg = $origen.$destino.$clave.$vuelo.$categoria.$asiento.$apellido.$nombre.$fecha.$hora;
?>
<page backtop="10mm" >
    <page_header>
        <table style="width: 100%; height: 600%; border: solid 3px black;">
            <tr>
                <img src="logo1.jpg" alt="logo" width="100" height="auto"/>
				<td style="text-align: right; width: 100%">AIRLINES.COM</td>
                
			</tr>
        </table>
	</page_header>
    
	
  
	
	

	<img src="enc-pasaje.jpg" alt="encabezado" width="740" height="42"/>
	
	<table style="border: solid 0px black; width: 140mm; margin-left:18mm;">
    <tr>
	<td style="width: 40%; border: solid 0px black; text-align: left; background-color:#D1D1E0">ORIGEN:<?php echo"$origen <br>"; ?> DESTINO:<?php echo "$destino"; ?> </td>
	<td style="width: 40%; border: solid 0px black; text-align: left; background-color:#D1D1E0">ORIGEN:<?php echo"$origen <br>"; ?> DESTINO:<?php echo "$destino"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; background-color:#D1D1E0">ORIGEN:<?php echo"$origen <br>"; ?> DESTINO:<?php echo "$destino"; ?></td>
	</tr>
	<!--<tr>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">CATEGORIA:<?php echo "$categoria"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">CATEGORIA:<?php echo "$categoria"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">CATEGORIA:<?php echo "$categoria"; ?></td>
	</tr>-->
	<tr>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">CLAVE:<?php echo "$clave"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">CLAVE:<?php echo "$clave"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">CLAVE:<?php echo "$clave"; ?></td>
	</tr>
	<tr>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">VUELO:<?php echo "$vuelo"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">VUELO:<?php echo "$vuelo"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">VUELO:<?php echo "$vuelo"; ?></td>
	</tr>
	<tr>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">FECHA:<?php echo "$fecha"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">FECHA:<?php echo "$fecha"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">FECHA:<?php echo "$fecha"; ?></td>
	</tr>
	<tr>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">HORA:<?php echo "$hora"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">HORA:<?php echo "$hora" ; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">HORA:<?php echo "$hora"; ?></td>
	</tr>
	<tr>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">APELLIDO:<?php echo "$apellido"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">APELLIDO:<?php echo "$apellido"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">APELLIDO:<?php echo "$apellido"; ?></td>
	</tr>
	<tr>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">NOMBRE:<?php echo "$nombre"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">NOMBRE:<?php echo "$nombre"; ?></td>
	<td style="width: 40%; border: solid 0px black; text-align: left; ">NOMBRE:<?php echo "$nombre"; ?></td>
	</tr>
</table>


<img src="pie-pasaje.jpg" alt="pie" width="740" height="42"/>	
<br>
<br>

	
    
</page>
<?php
     $content = ob_get_clean();

    // convert to PDF
    require_once(dirname(__FILE__).'/../html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('qrcode.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
