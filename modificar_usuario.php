
<!DOCTYPE html>
<html>
	<head>
		<title>Modificar Usario</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

		<link rel="stylesheet" href="css/estilos_menu_pagina.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estilos_usuarios.css">


		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
		<script src="js/main.js" ></script>

		 <!--LIGA PARA JQUERY -->
		
         
        <script type="text/javascript">
					$(document).ready(function(){
							
								$('#nuevoUsuario').hide(); 
								$('#claveN').hide(); 
								$('#botonModificar').hide();
								


							$("#continuarB").on( "click", function() {
								$('#usuario').show(); 
								$('#claveA').show(); 
								$('#continuarB').hide();
								$('#nuevoUsuario').show(); 
								$('#claveN').show(); 
								$('#botonModificar').show();
								
							 });
							

					});

			</script>

	</head>
	<body>



		<?php
			include("menu_pagina.html");
		?>


		<form >

			<h2>Modificar Usuario</h2>
			<input type="text"  id="usuario" placeholder="Usuario a modificar">
			<input type="password"  id="claveA" placeholder="clave Antigua">
			<input type="button" id="continuarB" value="Continuar">

			<input type="text" id="nuevoUsuario" placeholder="Nuevo Usuario">
			<input type="password"  id="claveN" placeholder="Nueva Clave">
			<input type="button" value="Modificar Usuario" id="botonModificar" >
		
		</form>
		<script type="text/javascript">
			$(function(){
				$("#botonModificar").click(function(){

					var cajaUsuario = $("#usuario").val();
					var cajaClaveA = $("#claveA").val();
					var cajaNuevoUsuario = $("#nuevoUsuario").val();
					var cajaClave =$("#claveN").val();
				    alert("modificando...");

				$.post('ws/wsUsuarios.php',
				{
					WS:"modUsuario",
					usuarioA:cajaUsuario,
					claveA : cajaClaveA,
					nuevoUsuario:cajaNuevoUsuario,
					clave:cajaClave

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