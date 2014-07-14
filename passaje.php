<?php
require('fpdf.php');
//include('index-2b.php');
//$clave9="susanita";
class PDF extends FPDF
{
//Cabecera de página
   function Header()
   {
    //Logo
    $this->Image("logo1.jpg" ,20,10,40,12, "JPG" ,"");
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Movernos a la derecha
    $this->Cell(80);
    //Título
    $this->Cell(60,10,'Airlines.com',0,'C');
    //Salto de línea
    $this->Ln();
      
   }
   
   //Pie de página
   function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   

   //Tabla simple
   /*function TablaSimple($header)
   {
    $this->Image('encabezado.jpg',15,100,180);

    //Cabecera
    foreach($header as $col)
    $this->Cell(40,7,$col,1);
    $this->Ln();
    
      $this->Cell(40,5,"hola",1);
      $this->Cell(40,5,"hola2",1);
      $this->Cell(40,5,"hola3",1);
      $this->Cell(40,5,"hola4",1);
      $this->Ln();
      $this->Cell(40,5,"linea ",1);
      $this->Cell(40,5,"linea 2",1);
      $this->Cell(40,5,"linea 3",1);
      $this->Cell(40,5,"linea 4",1);
    $this->Ln();  
      $this->Cell(40,5,"hola",1);
      $this->Cell(40,5,"hola2",1);
      $this->Cell(40,5,"hola3",1);
      $this->Cell(40,5,"hola4",1);
      $this->Ln();
   $this->Ln(50);
   $this->Image('pie.jpg',15,100,180);


   } */
   
   //Tabla coloreada
function TablaColores($header)
{
  include('index-2b.php');
  //$clave8="eraeso";
//Colores, ancho de línea y fuente en negrita
$this->SetFillColor(34,35,39); //color de cabecera 
$this->SetTextColor(255);
$this->SetDrawColor(34,35,39);// color de linea 
$this->SetLineWidth(.4); //valor de linea
$this->SetFont('','B',11);
$this->Ln(2);

//Cabecera
for($i=0;$i<count($header);$i++)
$this->Cell(40,7,$header[$i],1,0,'C',1);
$this->Ln();

//Restauración de colores y fuentes
$this->SetFillColor(224,224,224); // color de fila
$this->SetTextColor(0);
$this->SetFont('');

//Datos
   $fill=false; // fila 1
$this->Cell(40,6,"pes_orig",'LR',0,'C',$fill);
$this->Cell(40,6,"pes_dest ",'LR',0,'C',$fill);
$this->Cell(40,6,"pes_orig",'LR',0,'C',$fill);
$this->Cell(40,6,"pes_dest",'LR',0,'C',$fill);
$this->Ln();
	$fill=!$fill; // fila 2
$this->Cell(40,6,"Clave:",'LR',0,'C',$fill);//.$fila['domicilio']
$this->Cell(40,6,$clave,'LR',0,'L',$fill);
$this->Cell(40,6,"Clave:",'LR',0,'C',$fill);
$this->Cell(40,6,"clav",'LR',0,'L',$fill);
$this->Ln();     
	  $fill=!$fill; // fila 3
$this->Cell(40,6,"Vuelo:",'LR',0,'C',$fill);
$this->Cell(40,6,"vue",'LR',0,'L',$fill);
$this->Cell(40,6,"Vuelo:",'LR',0,'C',$fill);
$this->Cell(40,6,"vue",'LR',0,'L',$fill);
//$this->Cell(40,6, $this->Image('qr.jpg',148,68,30),'LR',0,'L'); 1 izq-der 2 abajo-arriba  3 tam img
$this->Ln();
      $fill=!$fill; // fila 4
$this->Cell(40,6,"Categoria:",'LR',0,'C',$fill);
$this->Cell(40,6,"cat",'LR',0,'L',$fill); 
$this->Cell(40,6,"Categoria:",'LR',0,'C',$fill);
$this->Cell(40,6,"cat",'LR',0,'L',$fill);
$this->Ln();
		$fill=!$fill; // fila 5
$this->Cell(40,6,"Asiento:",'LR',0,'C',$fill);
$this->Cell(40,6,"asien",'LR',0,'L',$fill);
$this->Cell(40,6,"Asiento:",'LR',0,'C',$fill);
$this->Cell(40,6,"asien",'LR',0,'L',$fill);
$this->Ln();
		$fill=!$fill; // fila 6
$this->Cell(40,6,"Apellido:",'LR',0,'C',$fill);
$this->Cell(40,6,"$apellido",'LR',0,'L',$fill);
$this->Cell(40,6,"Apellido:",'LR',0,'C',$fill);
$this->Cell(40,6,"ape",'LR',0,'L',$fill);
$this->Ln();
$fill=!$fill; // fila 7
$this->Cell(40,6,"Nombre:",'LR',0,'C',$fill);
$this->Cell(40,6,"nombre",'LR',0,'L',$fill);
$this->Cell(40,6,"Nombre:",'LR',0,'C',$fill);
$this->Cell(40,6,"nom",'LR',0,'L',$fill);
$fill=true;
$this->Ln();
$this->Cell(160,0,'','T');
}
}


$pdf=new PDF();
//Títulos de las columnas
$header=array('Origen ','Destino','Origen','Destino');
$pdf->AliasNbPages();
//Primera página
//$pdf->AddPage();
//$pdf->SetY(65);
//$pdf->AddPage();
//$pdf->TablaSimple($header);
//$pdf->Image('pie.jpg',15,100,180);
//Segunda página
$pdf->AddPage();
$pdf->Ln();
$pdf->Image('enc-pasaje.jpg',15,38,180);
//$pdf->SetY(46);
$pdf->SetMargins(22,20,20);
$pdf->Ln(20);
$pdf->TablaColores($header);// habilito tabla sin set Y
$pdf->SetMargins(0,0,0);//limpio set margins    	 		 	   
$pdf->Image('pie-pasaje.jpg',15,105,180); // 1 desp izq-der 2 des arriba-abajo 3 tam img
$pdf->Ln(26);
// Set font
$pdf->SetFont('Arial','I',10);
// Move to 8 cm to the right
$pdf->Cell(68);
// Texto centrado en una celda con cuadro 20*10 mm y salto de línea
$pdf->Cell(60,8,'Gracias por volar con nosotros',1,1,'C');
$pdf->Ln(1);
$pdf->Image('advertencias.jpg',30,145,150);
$pdf->Output();
?>