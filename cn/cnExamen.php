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

    public function getExamenCompleto($id)
    {
        $this->setQuery("select nombre from examen where examenId=$id ");
        $this->Ejecutar();
        
        $resultados=[];
        while($row = $this-> getResult() -> fetch_array() )
         
            $resultados[] = $row;

                
        return $resultados;  

    }

    public function getPreguntasRespuestas($id)
    {
        
        $this->setQuery(" select p.titulo, o.nombreO, o.tipo from question p join opciones o on p.id=o.preguntaId join examen e where p.examenId=$id and e.examenId=$id");


       
        $this-> Ejecutar();

        $resultados=[];

        while($row = $this-> getResult() -> fetch_array() ){
         
           
            $resultados[] = $row;
        }

                
        return $resultados; 


    
    }

    
    
    

}

?>