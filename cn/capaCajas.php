<?php
include_once ("../inc/conn.php");
/**
* 
*/
class Cajas extends Connection
{	
	function __construct()
	{

	}
	public function addCajas($instrucciones, $txt_caja/*, $id_examen, $grupo_cajas */){

		$this->setQuery(
		"insert into cajas(instrucciones, texto_caja, id_examen, grupo_caja) values ('$instrucciones','$txt_caja',  3,2 )");
		$this-> Ejecutar ();
	}
}
?>