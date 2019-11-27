<?php

class Trabajador{
	private $id;
	public $urlFoto;
	public $nombre;
	public $numVehiculo;
	public $placasVehiculo;
	public $horaInicio ;
	public $horaFin;

	public function setId($id){
		$this->id =$id;
	}
	public function getId(){
		return $this->id;
	}
}