<?php


$tipo =$_GET["tipo"];


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
    

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/main.js" ></script>
    
    <script src="validacionJs/index.js" ></script> 
   
</head>
<body>

    <?php 
        include("inc/menu_pagina.html");
    ?>


    <div class="wrap">
    	<center>

    		<form >
    		
    			<h1>Nuevo Examen</h1>

                <input type="hidden" id="tipoExamen" value="<?php echo $tipo ?>">
    	
    			<input type="text"  id="nombreId" placeholder="Titulo del Examen"><br><br>
    	
    			<input type="button" id="crearExamenBtn" value="Crear Examen" class="boton">

        	</form>


        </center>
	</div>
	<script type="text/javascript">
	$(function(){
			$("#crearExamenBtn").click(function(){
				var cajaExamen = $("#nombreId").val();
                var cajaTipo = $("#tipoExamen").val();
			
			$.post('ws/WsExamen.php',
			{
				WS:"addExamen",
				examen:cajaExamen,
                tipoE:cajaTipo

			},function(Respuesta){

				alert(Respuesta.Mensaje);
				if(Respuesta.codMensaje==100)
					window.location.href = "Lista.php";
                else if(Respuesta.codMensaje == 200)
                    alert(Respuesta.Datos); 
				
			},"json");
		});
	});

</script>
   
</body>
</html>