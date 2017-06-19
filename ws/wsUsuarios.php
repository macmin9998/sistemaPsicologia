<?php

include_once("../cn/cnUsuarios.php");

class wsUsuarios
{
	protected $Usuarios;
	protected $WS;

	public function __construct()
	{ 
		
        header('Content-Type: application/json');
		$this-> Usuarios = new Usuario();
        $this-> WS = $this->getPOST("WS");
        switch ($this-> WS) {
        	

            case 'addUsuario':

             
                $usuario = $this-> getPOST("usuario");
                $clave = $this-> getPOST("clave");
                $rep = $this -> getPOST("repetirClave");

                $errors = array();
                if(empty($usuario) )
                     $errors[]= "falta campo usuario ";
                if(empty($clave) )
                     $errors[]= "falta campo clave ";
                if(empty($rep) )
                     $errors[]= "falta campo repetir clave ";
                if($clave!=$rep)
                    $errors[]="Las claves no coinciden";
                 if ( !(filter_var($usuario, FILTER_VALIDATE_EMAIL) ) )
                    $errors[]= "Direccion de correo no valida "; 
                
               


                if(count($errors) == 0  ){
                    $inserta = $this -> Usuarios -> addUsuario($usuario,$clave); 
                    
                    $respuesta=[];
                    if($inserta){
                                $respuesta = array("Mensaje" => "Usuario Regristrado",
                                                        "codMensaje" => 100,
                                                        "Datos" => []
                                                        );

                                echo json_encode($respuesta);
                    }else{
                        $respuesta = array("Mensaje" => "¡Error!, No registrado , puede que el usuario ya exista",
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

            case 'buscarUsuario':

                $usuario = $this-> getPOST("usuario");
                $clave = $this-> getPOST("clave");

                $errors = array();
                if(empty($usuario) )
                     $errors[]= "falta campo usuario ";
                if(empty($clave) )
                     $errors[]= "falta campo clave ";
                if( !(filter_var($usuario, FILTER_VALIDATE_EMAIL) ) )
                $errors[]= "Direccion de correo no valida "; 

                if(count($errors) == 0  ){
                    $inserta = $this -> Usuarios -> buscarUser($usuario,$clave); 
                    
                    $respuesta=[];
                    if($inserta){
                                $respuesta = array("Mensaje" => "Bienvenido",
                                                        "codMensaje" => 100,
                                                        "Datos" => $inserta
                                                        );

                                echo json_encode($respuesta);
                    }else{
                        $respuesta = array("Mensaje" => "Error, Usuario no encontrado",
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

            case 'deleteUsuario':

                $usuario = $this-> getPOST("usuario");
                $errors = array();

                if(empty($usuario) )
                     $errors[]= "falta campo usuario ";
                if( !(filter_var($usuario, FILTER_VALIDATE_EMAIL) ) )
                $errors[]= "Direccion de correo no valida "; 

                if(count($errors) == 0  ){
                    $inserta = $this -> Usuarios -> borrarUsuario($usuario); 
                    
                    $respuesta=[];
                    if($inserta){
                                $respuesta = array("Mensaje" => "Usuario Eliminado",
                                                        "codMensaje" => 100,
                                                        "Datos" => $inserta
                                                        );

                                echo json_encode($respuesta);
                    }else{
                        $respuesta = array("Mensaje" => "Error, Usuario no encontrado",
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

            case 'modUsuario':

                $usuarioA = $this-> getPOST("usuarioA");
                $claveA = $this -> getPOST("claveA");
                $nuevo = $this -> getPOST("nuevoUsuario");
                $claveN= $this -> getPOST("clave");
                 $errors = array();
                
                if(empty($usuarioA) )
                     $errors[]= "falta campo usuario ";
                if(empty($claveA) )
                     $errors[]= "falta campo clave ";
                if(empty($nuevo) )
                     $errors[]= "falta campo usuario ";
                if(empty($claveN) )
                     $errors[]= "falta campo clave ";
                if ( !(filter_var($usuarioA, FILTER_VALIDATE_EMAIL) ) )
                    $errors[]= "Direccion de correo no valida "; 
                if ( !(filter_var($nuevo, FILTER_VALIDATE_EMAIL) ) )
                    $errors[]= "Direccion de correo no valida ";

                if(count($errors) == 0  ){
                    $inserta = $this -> Usuarios -> modifUsuario($usuarioA,$claveA,$nuevo,$claveN); 
                    
                    $respuesta=[];
                    if($inserta){
                                $respuesta = array("Mensaje" => "Usuario Modificado",
                                                        "codMensaje" => 100,
                                                        "Datos" => []
                                                        );

                                echo json_encode($respuesta);
                    }else{
                        $respuesta = array("Mensaje" => "¡Error!, No registrado se encontro el usuario ",
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

new wsUsuarios();

?>
