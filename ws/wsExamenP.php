<?php

include_once ("../cn/cnExamenP.php");
/**
* 
*/

/**
* 
*/


class wsExamen  
{
	protected $Examen;
	protected $WS;
	public function __construct()
	{
		header('Content-Type: application/json');
		$this -> Examen = new Examen();
		$this -> WS = $this -> getPOST("WS");
		switch ($this -> WS) {



            case 'consultaId':

                $url = $this-> getPOST("url");


                $errors = array();

                if(empty($url) ) 
                    
                    $errors[]="No existe el examen";

                if(count($errors) == 0 ){

                    $consulta = $this -> Examen ->consultaIdExamen($url);
                    
                    
                    $respuesta=[];

                    if($consulta){
                                $respuesta = array("Mensaje" => "Bienvenido al examen",
                                                        "codMensaje" => 100,
                                                        "Datos" => $consulta);

                                echo json_encode($respuesta);
                    }else{
                        $respuesta = array("Mensaje" => "¡Error!, examen no se encontro el examen ",
                                    "codMensaje" => 200,
                                    "Datos" => []
                                    );

                                 echo json_encode($respuesta);
                    }
                }
                
                if(isset($errors) and count($errors) > 0 ){

                    
                    $respuesta = array("Mensaje" => "Error",
                                    "codMensaje" => 200,
                                    "Datos" => $errors
                                    );
                        echo json_encode($respuesta);
                }

                



                break;
			

            case 'getExamenV1':
     

                $qryExamenV1 = $this -> Examen -> getExamenV1();

                echo json_encode(["mensaje"=>"","CodMensaje"=>0,"Datos"=>$qryExamenV1]);


                break;

            case 'getExamenV2':
     

                $qryExamenV2 = $this -> Examen -> getExamenV2();
                echo json_encode(["mensaje"=>"","CodMensaje"=>0,"Datos"=>$qryExamenV2]);


                break;

              case 'getExamenV3':
     

                $qryExamenV3 = $this -> Examen -> getExamenV3();
                echo json_encode(["mensaje"=>"","CodMensaje"=>0,"Datos"=>$qryExamenV3]);


                break;

             case 'getExamenAp':
                $examenId = $this-> getPOST("examenId");
                $qryExamenAp = $this -> Examen -> getExamenAp($examenId);
                echo json_encode(["mensaje"=>"","CodMensaje"=>0,"Datos"=>$qryExamenAp]);

            

                break;   

			case 'insertParticipante':
			
                $sexo = $this-> getPOST("sexo");
                $edad = $this-> getPOST("edad");
                $escolaridad = $this-> getPOST("escolaridad");
                $ciudad = $this-> getPOST("ciudad");
                $examenId = $this-> getPOST("examenId");
             

                if($sexo == ""){

                    $res[] = array('Mensaje' => "Elige tu sexo" );
                    echo json_encode($res);
                    break;
                }
                if($edad == ""){

                    $res[] = array('Mensaje' => "La edad es necesaria" );
                    echo json_encode($res);
                    break;
                }
                if($escolaridad == "" ){

                    $res[] = array('Mensaje' => "La escolaridad es obligatorio" );
                    echo json_encode($res);
                    break;
                }
                if($ciudad == ""){

                    $res[] = array('Mensaje' => "La ciudad es obligatorio" );
                    echo json_encode($res);
                    break;
                }

                $var=$this-> Examen -> insertParticipante($sexo, $edad,$escolaridad, $ciudad,  $examenId);

                if($var){

                    echo json_encode(array("Mensaje" => "Usuario registrado","codMensaje" => 100) );
                }
                else{

                    echo json_encode(array("Mensaje"=>"Usuario no registrado","codMensaje"=>200) );
                }

                break;

           
            


			default:
				
				break;
		}
	}

	public function getPOST($var)
	{
    	if(isset($_POST[$var]) )
       		return $_POST[$var];
    	else
    		return "N0";
	}
}
new wsExamen();

?>