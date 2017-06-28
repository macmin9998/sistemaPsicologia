<?php

include_once("../cn/cnExamen.php");

class WsExamen
{
	protected $Examen;
	protected $WS;

	public function __construct()
	{ 
		
        header('Content-Type: application/json');
		$this-> Examenes = new Examen();
        $this-> WS = $this->getPOST("WS");
        switch ($this-> WS) {
        	

            case 'addExamen':

             
                $examenNombre = $this-> getPOST("examen");
                $tipoExamen = $this-> getPOST("tipoE");

                $errors = array();

                if(empty($examenNombre) )
                     $errors[]= "falta llenar el campo titulo ";
                 if(empty($tipoExamen) )
                    $errors[]= "Examen no seleccionado";
                
                
                if(count($errors) == 0  ){

                    $url = md5($examenNombre);
                        
                    $inserta = $this -> Examenes -> addExamen($examenNombre,$url,$tipoExamen); 
                    
                    $respuesta=[];
                    if($inserta){
                                $respuesta = array("Mensaje" => "Examen Registrado",
                                                        "codMensaje" => 100,
                                                        "Datos" => []
                                                        );

                                echo json_encode($respuesta);
                    }else{
                        $respuesta = array("Mensaje" => "¡Error!, examen no registrado. ",
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

            case 'getExamen':

                $tipo = $this-> getPOST("tipo");

                $busca = $this-> Examenes -> getExamenes($tipo);

                
                $respuesta=[];

               if($busca){
                $respuesta= array("Mensaje" => "Aviones encontrados",
                                "codMensaje" => 100,
                                "Datos" => $busca);

                echo json_encode($respuesta);
                }else{
                    $respuesta= array("Mensaje" => "Aviones No encontrados",
                                "codMensaje" => 200,
                                "Datos" => []);
                echo json_encode($respuesta);
                } 


                break;

            case 'getMuestra':

                $id = $this-> getPOST("id");

                $muestra = $this-> Examenes -> getExamenCompleto($id);

                $respuesta=[];

               if($muestra){
                $respuesta= array("Mensaje" => "Examen  encontrado",
                                "codMensaje" => 100,
                                "Datos" => $muestra);

                echo json_encode($respuesta);
                }else{
                    $respuesta= array("Mensaje" => "Titulo de examen no encontrado",
                                "codMensaje" => 200,
                                "Datos" => []);
                echo json_encode($respuesta);
                } 

                break;

            case 'muestraContenido':
                $id = $this-> getPOST("id");
                $ver= $this-> Examenes -> getPreguntasRespuestas($id);
                $respuesta=[];
                
                if($ver){
                $respuesta= array("Mensaje" => "Contenido encontrado",
                                "codMensaje" => 100,
                                "Datos" => $ver);

                echo json_encode($respuesta);
                }else{
                    $respuesta= array("Mensaje" => "Contenido no encontrado",
                                "codMensaje" => 200,
                                "Datos" => []);
                echo json_encode($respuesta);
                } 

                break; 

            case 'addPregunta':

                $pregunta = $this-> getPOST("pregunta");
                $idExamen = $this ->getPOST("idExamen");


                $errors = array();

                if(empty($pregunta) )
                     $errors[]= "Falta llenar campo de pregunta";
                if(empty($idExamen) )
                    $errors[]= "Examen no seleccionado";

                 
                if(count($errors) == 0  ){

                    $ver= $this-> Examenes -> agregaPregunta($pregunta,$idExamen);


                    $respuesta=[];
                    
                    if($ver){

                    $respuesta= array("Mensaje" => "Pregunta agregada",
                                    "codMensaje" => 100,
                                    "Datos" => $ver);

                    echo json_encode($respuesta);
                    }else{
                        $respuesta= array("Mensaje" => "Algo fallo ",
                                    "codMensaje" => 200,
                                    "Datos" => []);
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

            case 'agregarOpcion':


 
                $opcion = $this-> getPOST("opcion");
                $preguntaId = $this-> getPOST("preguntaId");

                $errors = array();

                if(empty($opcion) )
                     $errors[]= "Falta llenar campo de opcion";
                
                if(empty($preguntaId) )
                    $errors[]= "No agrego una pregunta";

                 
                if(count($errors) == 0  ){


                    $ver= $this-> Examenes -> agregaOpcion($opcion,$preguntaId);


                    $respuesta=[];
                    
                    if($ver){

                    $respuesta= array("Mensaje" => "Opcion agregada",
                                    "codMensaje" => 100,
                                    "Datos" => $ver);

                    echo json_encode($respuesta);
                    }else{
                        $respuesta= array("Mensaje" => "Error al agregar Opcion ",
                                    "codMensaje" => 200,
                                    "Datos" => []);
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

           
        	case 'N0':

        		$res= array ("Mensaje" => "El webservice no puede estar vacio", "codMensaje" => 200 );
        		echo json_encode($res);

        		break;
        	
        	default:

        		$res= array ("Mensaje" => "El webservice no existe", "codMensaje" => 200 );
        		echo json_encode($res);
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

new WsExamen();

?>
