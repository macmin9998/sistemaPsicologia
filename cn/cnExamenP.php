<?php


include_once("../inc/conn.php");


/**
* 
*/
class Examen extends Connection
{
	
	function __construct()
	{
	
	}

    public function getExamenV1(){
		$ExamenV = [];

		$this -> setQuery(" select examenId,nombre,url from examen where tipoExamen=1");
							
		$this-> Ejecutar ();

		while($qryResult = $this-> getResult() -> fetch_array()){

			$ExamenV[] = $qryResult;

		}
		    	
        return $ExamenV; 

	}

	public function getExamenV2(){
		$ExamenV2 = [];

		$this -> setQuery(" select examenId,nombre,url from examen where tipoExamen=2");
							
		$this-> Ejecutar ();

		while($qryResult = $this-> getResult() -> fetch_array()){

			$ExamenV2[] = $qryResult;

		}
		    	
        return $ExamenV2; 

	}

	public function getExamenV3(){
		$ExamenV = [];

		$this -> setQuery(" select examenId,nombre,url from examen where tipoExamen=3");
							
		$this-> Ejecutar ();

		while($qryResult = $this-> getResult() -> fetch_array()){

			$ExamenV[] = $qryResult;

		}
		    	
        return $ExamenV; 

	}

       public function getExamenAp($examenId){
		$ExamenAp = [];

		$this -> setQuery(" select  p.titulo, o.nombreO, o.valor from examen AS exa join  question AS p ON exa.examenId = p.examenId join opciones AS o ON  p.id = o.preguntaId where  exa.examenId=$examenId ");
							
		$this-> Ejecutar ();

		while($qryResult = $this-> getResult() -> fetch_array()){

			$ExamenAp[] = $qryResult;

		}
		    	
        return $ExamenAp; 

	}


	

	public function insertParticipante($sexo, $edad,$escolaridad, $ciudad,  $examenId){
		$this -> setQuery("insert into participante (sexo , edad, escolaridad, ciudad, examenId) values ('".$sexo."', $edad, '".$escolaridad."', '".$ciudad."', $examenId) ");
		$this -> Ejecutar();

        return true;

       /*if($this -> isCorrect ){
             return true;
        }
        else{
            //return false;   
        }*/
	}

	public function consultaIdExamen($url)
	{

		$this-> setQuery("select examenId from examen where url='$url' ");
		$this->Ejecutar();
		$examenIdE=[];
 	
		while($res = $this-> getResult() -> fetch_array()){

			$examenIdE = $res;

		}
		    	
        return $examenIdE; 




	}
	
	

}
?>