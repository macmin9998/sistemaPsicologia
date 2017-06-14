<?php
//session_start();
//if(isset($_SESSION['sun'])){

include "includs/conexion.php";


if (isset($_POST['crearExamenBtn'])) {
    $errors = array();


	if (!isset($_POST['TituloTxt']) || empty($_POST['TituloTxt']) || ctype_digit($_POST['TituloTxt'])  ){
	//aparece un error 

       $errors[]="nombre de examen no valido";

    }



if(count($errors) == 0) {  


        
        $nombre=$_POST['TituloTxt'];

		$insertExamen=$conexion->query("insert into examen(nombre) values ('$nombre') ");
   		header('Location:Lista.php');
}

    
}


?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

	<title>Crear Nuevo Examen</title>

    <link rel="stylesheet" href="css/estilos_menu_pagina.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/nuevo.css">
    

    

    
    <script src="validacionJs/index.js" ></script> 
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

    <div class="wrap">
    	<center>
    		<form action="" method="POST" onsubmit="return validaF();">
    		
    			<h1>Nuevo Examen</h1>
    	
    			<input type="text" name="TituloTxt" id="nombreId" placeholder="Titulo del Examen"><br><br>
    	
    			<input type="submit" name="crearExamenBtn" id="crearExamenBtn" value="Crear Examen">

        	</form>


        </center>
	</div>
	<script type="text/javascript">
	$(function(){
			$("#crearExamenBtn").click(function(){
				var cajaExamen = $("#nombreId").val();
			
			$.post('#',
			{
				WS:"#",
				examen:cajaExamen
			},function(Respuesta){
				alert(Respuesta.Mensaje);
				if(Respuesta.CodMensaje==100)
					window.location= window.location;
				
			},"json");
		});
	});

</script>
    <?php
//}
    
//else{

  //   header("location: sinSesion.html");

//}
?>   
</body>
</html>