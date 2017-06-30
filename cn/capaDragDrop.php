<?php
include_once("../inc/conn.php");
/**
* 
*/
class dragDrop extends Connection
{
	
	function __construct()
	{

	}
	public function getCajas(){
		$this -> setQuery("select * from cajas");
		$this -> Ejecutar();
		while ($row = $this -> getResult()-> fetch_array())
		{
			$resultados[] = $row;
			
		}
		return $resultados;
	}
}