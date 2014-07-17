<?php
//Seteo el idioma local para que las fechas no esten en ingles
setlocale(LC_ALL,"es_ES@euro","es_ES","esp","es");

date_default_timezone_set('America/Argentina/Buenos_Aires');

//Cargo los dias de la semana en un array en donde 1-Lunes y 7-Domingo el ''- Es el 0 pero no lo tenemos en cuenta.
$dias = array('','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');

$_SESSION['fechap'] = $_POST['fechap'];
$_SESSION['fechar'] = $_POST['fechar'];

//$varFecha1 = $_POST['fechap'];

if ($vengodevuelo == 1)
{
    $varFecha1 = $_POST['fechar'];
}
echo $varFecha1;
//Obtengo el valor en string de la fecha seleccionada, si es lunes, martes, etc.
//$fecha = $dias[date('N', strtotime($fecha2))];
//$ss = split("/",$varFecha1);
$ss = explode("/",$varFecha1);

$fecha = $dias[date('N', strtotime($ss[1]."/".$ss[0]."/".$ss[2]))];
//echo strtotime($ss[1]."/".$ss[0]."/".$ss[2]);

//echo "</br>FECHA AHORA : " . $fecha;
//Inicio el array
$arraydia = array();
$pos=55;
//Asigno segun el dia un valor en un array para compararlo con el binario recibido
switch ($fecha) {
    case 'Lunes':
        $arraydia[0]=1;
        $pos=0;        
        break;
    case 'Martes':
        $arraydia[1]=1;
        $pos=1;        
        break;
    case 'Miercoles':
        $arraydia[2]=1;
        $pos=2;        
        break;
    case 'Jueves':
        $arraydia[3]=1;
        $pos=3;        
        break;
    case 'Viernes':
        $arraydia[4]=1;
        $pos=4;        
        break;
    case 'Sabado':
        $arraydia[5]=1;
        $pos=5;        
        break;
    case 'Domingo':
        $arraydia[6]=1;
        $pos=6;        
        break;
                }       
    //Con esto obtengo un array que separa los 1 y los 0 de forma $var[0]=1,$var[1]=1, etc.      
    $arraybinarios=str_split($bin);   
?>