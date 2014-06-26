<?php
//Seteo el idioma local para que las fechas no esten en ingles
setlocale(LC_ALL,"es_ES@euro","es_ES","esp","es");
//Cargo los dias de la semana en un array en donde 1-Lunes y 7-Domingo el ''- Es el 0 pero no lo tenemos en cuenta.
$dias = array('','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');

$varFecha1= $_POST['fechap'];
//Obtengo el valor en string de la fecha seleccionada, si es lunes, martes, etc.
//$fecha = $dias[date('N', strtotime('2014-06-26'))]; 
$fecha = $dias[date('N', strtotime($varFecha1))]; 
echo "</br>FECHA AHORA : " . $fecha;

//Inicio el array
$arraydia = array();
$pos=55;
//Asigno segun el dia un valor en un array para compararlo con el binario recibido
switch ($fecha) {
    case 'Lunes':
        $arraydia[0]=1;
        $pos=0;
        echo "i es igual a 0 " . $arraydia[0];
        break;
    case 'Martes':
        $arraydia[1]=1;
        $pos=1;
        echo "i es igual a 1 " . $arraydia[1];
        break;
    case 'Miercoles':
        $arraydia[2]=1;
        $pos=2;
        echo "i es igual a 2 " . $arraydia[2];
        break;
    case 'Jueves':
        $arraydia[3]=1;
        $pos=3;
        echo "i es igual a 3 " . $arraydia[3];
        break;
    case 'Viernes':
        $arraydia[4]=1;
        $pos=4;
        echo "i es igual a 4 " . $arraydia[4];
        break;
    case 'Sabado':
        $arraydia[5]=1;
        $pos=5;
        echo "i es igual a 5 " . $arraydia[5];
        break;
    case 'Domingo':
        $arraydia[6]=1;
        $pos=6;
        echo "i es igual a 6 " . $arraydia[6];
        break;
                }   
    //$bin = 1111100;
    //echo "<h2>Funcion binarios</br></h2>" . $pos;    
    //Con esto obtengo un array que separa los 1 y los 0 de forma $var[0]=1,$var[1]=1, etc.                
    $arraybinarios=str_split($bin);
    //Hago la busqueda de ese vuelo y veo que dias realiza el vuelo en base al array 1- Si , 0- No
    /* for ($i=0; $i < 7; $i++) { 
     echo "</br>";
     echo $arraybinarios[$i];
                              }    */
?>