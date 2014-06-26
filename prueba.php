
<div class="marker">
	<div class="wrapper">
		<div id="lineaIda">
          <ul> 
            <li><strong> ROTULOS IDA </strong></li>
          </ul>
          <ul> 
            <label><li><input type="radio" name="i1"></li><li> Sale: $horaSale </li><li> Llega: $horaLlegada </li><li> $TiempoViaje </li><li> Directo </li><li> $LineaAvion </li></label>
          </ul> 
          <ul> 
            <label><li><input type="radio" name="i1"></li><li> Sale: $horaSale </li><li> Llega: $horaLlegada </li><li> $TiempoViaje </li><li> Directo </li><li> $LineaAvion </li></label>
          </ul> 
          <ul> 
            <label><li><input type="radio" name="i1"></li><li> Sale: $horaSale </li><li> Llega: $horaLlegada </li><li> $TiempoViaje </li><li> Directo </li><li> $LineaAvion </li></label>
          </ul> 
          <ul> 
            <label><li><input type="radio" name="i1"></li><li> Sale: $horaSale </li><li> Llega: $horaLlegada </li><li> $TiempoViaje </li><li> Directo </li><li> $LineaAvion </li></label>
          </ul> 
        </div>
	</div>
</div>
<div class="marker">
	<div class="wrapper">
		<div id="lineaIda">
          <ul> 
            <li><strong> ROTULOS Vuelta </strong></li>
          </ul>
          <ul> 
            <label><li><input type="radio" name="v1"></li><li> Sale: $horaSale </li><li> Llega: $horaLlegada </li><li> $TiempoViaje </li><li> Directo </li><li> $LineaAvion </li></label>
          </ul> 
          <ul> 
            <label><li><input type="radio" name="v1"></li><li> Sale: $horaSale </li><li> Llega: $horaLlegada </li><li> $TiempoViaje </li><li> Directo </li><li> $LineaAvion </li></label>
          </ul> 
          <ul> 
            <label><li><input type="radio" name="v1"></li><li> Sale: $horaSale </li><li> Llega: $horaLlegada </li><li> $TiempoViaje </li><li> Directo </li><li> $LineaAvion </li></label>
          </ul> 



<?php
function list_system_locales(){
    ob_start();
    system('locale -a');
    $str = ob_get_contents();
    ob_end_clean();
    return split("\\n", trim($str));
}
//$a = list_system_locales();

//var_dump($a);

setlocale(LC_ALL,"es_ES@euro","es_ES","esp","es");

//$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
$dias = array('','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');

$fecha = $dias[date('N', strtotime('2014-06-26'))]; 


echo "FECHAAAAAAAAAAAAAAAA NUMEROOOOOOO" . $fecha;

$arraydia = array();

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
        echo "i es igual a 6 : \t" . $arraydia[6];
        break;
                }

    $bin = 1111100;
    echo "Funcion binarios</br>" . $bin;                
    $arraybinarios=str_split($bin);

     for ($i=0; $i < 7; $i++) { 
     echo "</br>";
     echo $arraybinarios[$i];
                              }

     if ($arraydia[$pos]==$arraybinarios[$pos])
     {
      // Hago la consulta sino muestro mensaje!
      echo "CLARO QUE AHORA HAY VUELOS";
     }
     else
     {

        echo "No se encontraron vuelos para esa fecha pruebe nuevamente";
     }
   


?>
          <ul> 
            <label><li><input type="radio" name="v1"></li><li> Sale: $horaSale </li><li> Llega: $horaLlegada </li><li> $TiempoViaje </li><li> Directo </li><li> $LineaAvion </li></label>
          </ul> 
        </div>
  </div>
</div>

<div class="wrapper pad_bot2">
  <a href="#" class="button2">Seleccionar</a>
</div>