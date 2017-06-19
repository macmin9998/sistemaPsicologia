<?php 
//session_start();
//if(isset($_SESSION['sun'])){

include "includs/conexion.php";


$id = $_GET['id'];
$cont = 0;
$errors = array();
$validacion="";

$titulo = ''; 
if(isset($_POST['titulo'])) { 

	if(empty($_POST['titulo']) || ctype_digit($_POST['titulo']) ){
		$errors[]="nombre de examen no valido";
	

	} else {


   
        $titulo = ($_POST['titulo']);
        	
        

        }


}
	



if(isset($_POST['enviar'])){
     

    if(count($errors) ==0 ){
    	  
	  	$num = $_POST['opciones']; 
	  
        
  		$insertPregunta=$conexion->query("insert into encuestas(titulo,id_examen) values('$titulo','$id'); ");
        
        $consultaId=$conexion->query("SELECT MAX(id) as idc FROM encuestas");

        while($idCons = $consultaId->fetch_assoc()){
        
        	$id_encuesta=$idCons['idc'];


        }
      
        $insertOpciones="INSERT INTO opciones(id_encuesta,nombre,valor,id_examenop,tipo) values";
        
		for($i=1;$i<=$num;$i++){
                

			$opcnativa = trim($_POST['opc'.$i]); // obtenemos el nombre de cada opcion indivudalmente.
			if($opcnativa != ""){
				$insertOpciones .= "('$id_encuesta',  '$opcnativa',  '".$i."','$id','1')"; // el id de la opcion ira null para que se ponga automaticamente, en id_encuesta pues ira el id de la encuesta que acabamos de crear, en 'nombre' ira el nombre de la opcion y valor ira 0, puesto que es una nueva opcion sin votos, esto se repetira con todas las opciones que el usuario haya definido.
				$cont++;
			}


			if($i == $num){
				$insertOpciones .= ";"; // si es que se llega al final, termina la consulta
			}else{
				$insertOpciones .= ", "; // sino se pone una , y se continua.
			}
		}
            
		$ejecuta=$conexion->query($insertOpciones);
		header("Location: Crea.php?id=$id");
    }
        
}

?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
	<title>Agregar preguntas</title>

	<link rel="stylesheet" href="css/estilos_menu_pagina.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/nuevo.css">

    <script src="validacionJs/agregar1.js" ></script> 
	<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <script src="javascript/main.js" ></script>
</head>

<body>
<?php
        include("menu_pagina.html");
    ?>

<?php

        if(isset($errors) and count($errors) > 0 ){
            foreach($errors as $error){
               
               echo "<div class='divError'>".$error."</div>";
                

            }
        }
?> 

<div class="wrap_agrega">
	<h1>Agregar Preguntas</h1>
	<form action="" method="post" onsubmit="return validaForm();">
	<span>
		<label>Pregunta: </label>
		<input id="idpregunta" name="titulo" type="text" placeholder="Escribe tu pregunta" value="<?php echo $titulo; ?>" size="26">
		

	</span>
	<?php
	
        // esto es simplemente un formulario, pero aqui hacemos una condicion, identificamos si se ha definido un numero de opciones, si es si hacemos un bucle, si es no mostramos el select para definir un numero de opciones, como es obvio por defecto se mostrara el bucle:
	

	if(isset($_POST['opc']) and !empty($_POST['titulo']) ){

    	$num = $_POST['opciones']; // guardamos el valor del numero de opciones
		
		for($i=1;$i<=$num;$i++){ // hacemos el bucle mostrando los campos respectivos.

	?>
	<div class="cf">
		<label>Opcion <?php echo $i; ?>: </label>
		<input name="opc<?php echo $i; ?>" type="text" size="43">
		<input name="opc<?php echo $i; ?>" type="text" size="5" placeholder="valor">
	</div>
	<?php } // aqui termina el bucle ?>
	<div class="cf">
		<center>
    		<input name="enviar" type="submit" value="Registrar Pregunta">
        	<input name="opciones" type="hidden" value="<?php echo $num; ?>">
        	
        	<input name="cont" type="hidden" value="<?php echo cont; ?>">
    	</center>
    </div>
	<?php
	} else{ // sino se ha definido nro de opciones: ?>
	<span class="fl cantidadPreguntas">
		<select> 
			 <option value="" disabled selected>Tipo de pregunta</option>
			 <option value="radio">Respuesta Unica</option>
  			 <option value="check">Respuesta multiple</option>
  			 <option value="abierta">Abierta</option>
		</select>
    		<select name="opciones">
    		<option value="" disabled selected>No.opciones</option>
    		<?php for($i=2;$i<=10;$i++){ // esto es un loop simple, solo para ahorrarnos trabajo, este select tendra de 2 a 20 opciones, si deseas cambiarlo lo puedes hacer aqui. ?>
    		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
    		<?php } ?>
			</select>
		
		
	<br>	
	<br>
	</span>

    <div class="cf">
    	<center>
      		<input name="opc" type="submit" value="Continuar">
    	</center>
    </div>

      <?php } 


      // Sino se han definido opciones, que en vez de salir el boton de Enviar, salga uno que sea Continuar. ?>
    
	 <div class="linkvolver">
    <?php
 		 echo "<a href='Crea.php?id=".$id." ' >Volver</a><br> ";
    ?>
    </div>
    </form>


    

	</div>

<?php
//}else{

//	header("location: sinSesion.html");


//}

?>
</body>
</html>