<?php

include_once("../inc/conn.php");

class Usuario extends Connection
{

	public function __construct()
	{
        
	}

	
	public function addUsuario($usuario,$clave)
	{
        
        $this->setQuery("select usuario from usuarios where usuario='$usuario' ");
    	$this->Ejecutar();
        $resultado = $this-> getResult() ->fetch_array();
    	if(count($resultado) > 0){

    		
    		
    		return false;

    	}else{

    		$this->setQuery("insert into usuarios(usuario,clave)values('$usuario','$clave')");
			$this-> Ejecutar();
	        return $this-> getIsCorrect();

    	} 
    		

		
       
        
    }

    public function buscarUser($usuario,$clave)
    {
    	$this->setQuery("select id from usuarios where usuario='$usuario' and clave='$clave' ");
    	$this->Ejecutar();

    	
    	$resultadoId = $this-> getResult() ->fetch_array();

    	if(count($resultadoId) > 0){

    		$userIdB = $resultadoId["id"];

    		//jsonR = array("id" => $userIdB);
    		return $userIdB;

    	}else 
    		return false;
    }

    public function borrarUsuario($usuario)
    {
    	
        
    	$this->setQuery("select usuario from usuarios where usuario='$usuario' ");
    	$this->Ejecutar();
        $resultado = $this-> getResult() ->fetch_array();
        
        if(count($resultado) > 0){

    		$userName = $resultado["usuario"];
            $this->setQuery("delete from usuarios where usuario='$userName' ");
    	    $this->Ejecutar();
    		
    		return true;

    	}else 
    		return false;
    	

    	

    }

    public function modifUsuario($usuarioA,$claveA,$nuevo,$claveN)
    {
    	
    	$this->setQuery("select id from usuarios where usuario='$usuarioA' and clave='$claveA'");
    	$this->Ejecutar();

    	
    	$resultadoId = $this-> getResult() ->fetch_array();

    	if(count($resultadoId) > 0){

    		$userId = $resultadoId["id"];
           
           $this->setQuery("update usuarios set clave=$claveN,usuario='$nuevo' where id='$userId'");
    	   $this->Ejecutar();
    		
    		return $this-> getIsCorrect();


    	}else 
    		return false;




    }
    
    

}

?>