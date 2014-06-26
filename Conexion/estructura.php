

<?php
//Modelo donde definimos la estructura de la base incluyendo el archivo de configuracion

require_once "conexion/config.php";

class Modelo
{

	protected $_db;

	//Constructor de la clase Modelo//
	//==============================//
	public function Modelo()
	{
		$this->_db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		//Chequeamos si nos da error al conectarnos y el numero de error
		if ($this->_db->connect_errno)
		{
			echo "Error al conectar con la base de datos : " . $this->_db->connect_errno;
		}

		//Seteamos los caracteres admitidos en el objeto db
		$this->_db->set_charset(DB_CHARSET);

	}

}

?>