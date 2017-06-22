<?php
include_once("../cn/capaCajas.php");
/**
* 
*/
class wsCajas
{
	protected $Cajas;
	protected $WS;
	public function __construct()
	{
		header('Content-Type: application/json');
		$this -> Cajas = new Cajas();
		$this-> WS = $this->getPOST("WS");
        switch ($this-> WS) {
			case 'addCajas':
				$instrucciones = $this ->getPOST("instrucciones");
				$txt_caja = $this ->getPOST("txtCaja");

				if($instrucciones == "N0"){
					$res[] = array("Mensaje" => "instrucciones no debe estar vacio" );
						echo json_encode($res);
						break;
				}
				if($txt_caja == "N0"){
					$res[] = array("Mensaje" => "Usuario no debe estra vacio" );
						echo json_encode($res);
						break;
				}

				$qry=$this-> Cajas-> addCajas($instrucciones, $txt_caja);
				if($qry){
					echo json_encode( array (
							"Mensaje"=> "Movimiento exitoso",
							"CodMensaje" =>100) );
				}
				else{
						echo json_encode(array (
							"Mensaje"=> "Fallido",
							"CodMensaje" =>200
							));
					}
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

new wsCajas();
?>