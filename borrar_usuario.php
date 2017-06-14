
<!DOCTYPE html>
<html>
	<head>
		<title>Borrar Usario</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
		<link rel="stylesheet" href="css/estilos_menu_pagina.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<link rel="stylesheet" href="css/estilos_usuarios.css">
		
		
		<script src="javascript/main.js" ></script>
		<script src="javascript/validaBorrarUsuarios.js" ></script>

		<!--LIGA PARA JQUERY -->
		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>

	</head>
	<body>
	<!--
	<?php
		//include("menu_pagina.html");
	?>

	-->
		<form >
			<h2>Borrar Usuario</h2>
			<input type="text"  id="usuario" placeholder="Usuario">
			<input type="button" value="Borrar Usuario" id="botonBorrar" >
		
		</form>

		<script type="text/javascript">
			$(function(){
				$("#botonBorrar").click(function(){

					var cajaUsuario = $("#usuario").val();
                    alert("Eliminando Usuario...");
				$.post('ws/wsUsuarios.php',
				{
					WS:"deleteUsuario",
					usuario:cajaUsuario
					},function(Respuesta){
						       
						                 alert(Respuesta.Mensaje);
										if(Respuesta.codMensaje == 100)
								 	    	window.location =window.location; 
										else if(Respuesta.codMensaje == 200){
											
										    alert(Respuesta.Datos);	
								        }
										
					},"json");
				});
			});
		</script>
	</body>
</html>