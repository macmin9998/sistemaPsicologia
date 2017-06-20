<?php

include_once("../inc/conn.php");

class Examen extends Connection
{

	public function __construct()
	{
        
	}

	
	public function addExamen($examenNombre,$url)
	{
        
        $this->setQuery("insert into examen(nombre,url) values('$examenNombre','$url') ");
    	$this->Ejecutar();
       
	    return $this-> getIsCorrect();

    	
    }

    public function getExamenes()
    {
        $this-> setQuery("select examenId,nombre,url from examen");
        $this->Ejecutar();
        $resultados=[];
        while($row = $this-> getResult() -> fetch_array() )
         
            $resultados[] = $row;

                
        return $resultados;    




    }

    
    
    

}

?>