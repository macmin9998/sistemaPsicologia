<?php

include_once("../cn/capaDragDrop.php");

/**
* 
*/
class wsDragDrop
{
	protected $dragDrop;
	protected $WS;
	

	public function __construct()
	{
		header('Content-Type: application/json');
		$this -> dragDrop = new dragDrop();
		$this-> WS = $this -> getPOST("WS");

		switch ($this -> WS) {
			case 'getCajas':
					$resultados = $this -> dragDrop -> getCajas();
					//var_dump($resultados);
					echo json_encode($resultados);
					break;
				
				default:
				    $res = array("Mensaje" => "El WebService no existe", "CodMensaje" => 200);
				    echo json_encode($res);
					break;
			}	
	}

	public function getPOST($var){
		if (isset($_POST[$var])) {
			return $_POST[$var];
		}
		else {
			return "N0";
		}
	}
}

new wsDragDrop();

?>