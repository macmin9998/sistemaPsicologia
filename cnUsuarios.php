<?php

include_once("inc/conn.php");

class Usuario extends Connection
{

	public function __construct()
	{
        
	}

	
	public function addUsuario($usuario,$clave);
	{
        
        
		$this->setQuery("insert into usuarios(usuario,clave)values($usuario,$clave)");
		$this-> Ejecutar();
        return $this-> getIsCorrect();
       
        
    }
    public function 
    
    

}

?>