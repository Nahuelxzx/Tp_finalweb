<?php
class pasaje{		
	//Atributos para usar en el PDF se pueden agregar mas en caso que sea necesario!!!
	private $aeptoOrigen;
	private  $aeptoDestino;
	private  $claveAutoNumerica;
	private  $nroVuelo;
	private  $categoria;
	private  $asiento;
	private  $apellido;
	private  $nombre;
	private  $fecha;

	public function __construct($datos){	
	
	//var_dump($datos);
		foreach ($datos as $row)
		{
			$this->aeptoOrigen = $row['CiudadOrigen'];
			$this->aeptoDestino = $row['CiudadDestino'];
			$this->claveAutoNumerica = $row['Clave'];
			$this->nroVuelo = $row['NroVuelo'];
			$this->categoria = $row['Categoria'];
			$this->asiento = $row['NroAsiento'];
			$this->apellido = $row['Apellido'];
			$this->nombre = $row['Nombre'];
			$this->fecha = $row['FechaSalida'];			
		}
									  } //Fin del constructor

	public function getAeptoOrigen(){
		return $this->aeptoOrigen;
	}

	public function getAeptoDestino(){
		return $this->aeptoDestino;
	}

	public function getClaveAuto(){
		return $this->claveAutoNumerica;
	}

	public function getNroVuelo(){
		return $this->nroVuelo;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function getAsiento(){
		return $this->asiento;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getFecha(){
		return $this->fecha;
	}	
}
?>