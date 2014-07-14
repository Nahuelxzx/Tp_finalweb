<?php
require('fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo1.jpg',20,10,40);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->SetX(95);
	$this->SetFont('','U');
	$link = $this->AddLink();
	// Then put a blue underlined link
    $this->SetTextColor(0,0,255);
	$this->Write(10,'airlines.com',$link);
	$this->SetFont('');	
	
	
	// Movernos a la derecha
    //$this->Cell(80);
    // Título
    //$this->Cell(40,10,'airlines.com',1,0,'C');
    // Salto de línea
    $this->Ln(20);


	
	
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(6);
$pdf->SetFont('arial','B',12);
$pdf->Cell(40,10,'¡Hola!');
// Salto de línea
$pdf->Ln(6);
$pdf->Cell(40,10,'¡Hola, Mundo!');
// Salto de línea
$pdf->Ln(6);
$pdf->Image('encabezado.jpg',15,40,180);
$pdf->Ln(2);
//--------------------cuerpo del pasaje
    $pdf->SetMargins(20,20,20);
	$pdf->Ln(10);

    $pdf->SetFont('Arial','',12);
   
	$pdf->SetDrawColor(0,80,180);
    $pdf->SetFillColor(232,232,232);
    $pdf->SetTextColor(34,35,39);
	
	//$pdf->Cell(0,6,'Clave: '.$fila['clave'],0,1);
	$pdf->Cell(0,6,'Clave:',0,1,'L',true);
	$pdf->Ln(1);
	//$pdf->Cell(0,6,'Nombre: '.$fila['nombre'].' '.$fila['apellido_paterno'].' '.$fila['apellido_materno'],0,1);
	$pdf->Cell(0,6,'Nombre: ',0,1,'L',true);
	$pdf->Ln(1);
	//$pdf->Cell(0,6,'Sexo: '.$fila['sexo'],0,1); 
	$pdf->Cell(0,6,'Sexo: ',0,1,'L',true); 
	$pdf->Ln(1);
	//$pdf->Cell(0,6,'Domicilio: '.$fila['domicilio'],0,1); 
	$pdf->Cell(0,6,'Domicilio: ',0,1,'L',true); 
	//estos tres ultimas lineas es para desactivar en este caso el color que le corresponde a la variable 
	$pdf->SetFillColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	$pdf->SetTextColor(0,0,0);
	
	$pdf->Ln(10);

	//--------------------fin del cuerpo
$pdf->Image('pie.jpg',15,100,180);
$pdf->Ln(6);
$pdf->Image('advertencias.jpg',30,190,150);
$pdf->Ln(50);
// Set font
$pdf->SetFont('Arial','I',10);
// Move to 8 cm to the right
$pdf->Cell(60);
// Texto centrado en una celda con cuadro 20*10 mm y salto de línea
$pdf->Cell(60,8,'Gracias por volar con nosotros',1,1,'C');
$pdf->Output();
?>
