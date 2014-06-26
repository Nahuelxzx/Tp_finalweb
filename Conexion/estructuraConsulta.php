<?php

//Archivo que hereda los metodos de la clase modelo y sera utilizado para las consultas//
//Llamamos al arhivo estructura
require_once "estructura.php";

//Creamos la clase estructuraModelo que es hija de la clase estructura
class estructuraModelo extends Modelo
{

	public function __construct()
	{
		parent::__construct();

	}

	public function get_sql($sqlpar)
	{		
		//$result = $this->_db->query('select A1.Ciudad as CiudadOrigen, A2.Ciudad as CiudadDestino from vuelo V1 inner join aeropuerto A1 on V1.Aepto_Origen = A1.idAepto inner join aeropuerto A2 on V1.Aepto_Destino = A2.idAepto where A2.Provincia = "Neuquen" and A1.Provincia= "Chubut" and V1.Fecha_Salida = "2014-05-10" ');
		$result = $this->_db->query($sqlpar);
		//var_dump($sqlpar);
		$user = $result->fetch_all(MYSQLI_ASSOC);
		return $user;
	}

	public function get_sql_in($sqlpar)
	{			
		$resultin = $this->_db->query($sqlpar);
	}


	public function close_sql()
	{
		//mysqli::close ( void );
		//$mysqli->close();
		$this->_db->close();
	}

}

?>