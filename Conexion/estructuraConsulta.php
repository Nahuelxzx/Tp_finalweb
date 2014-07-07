<?php
//Archivo que hereda los metodos de la clase modelo y sera utilizado para las consultas//
//*************************************************************************************//
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
		$result = $this->_db->query($sqlpar);	
		$user = $result->fetch_all(MYSQLI_ASSOC);
		return $user;
	}

	public function get_sql_in($sqlpar)
	{			
		$resultin = $this->_db->query($sqlpar);
	}

	public function close_sql()
	{		
		//$mysqli->close();
		$this->_db->close();		
	}
}
?>