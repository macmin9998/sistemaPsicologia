
<!DOCTYPE html>
<html>
	<head>
		<title>Crear Usuario</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

		<link rel="stylesheet" href="css/estilos_menu_pagina.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estilos_usuarios.css">


		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <!--
		<script src="javascript/main.js" ></script>
		<script src="javascript/validaCrearUsuarios.js" ></script>
	-->
	</head>
	<body>
		
   <!--		<?php
		// include("menu_pagina.html");
		?>
    -->

		<form>
			
			<h2>Crear usuario</h2>
			<input type="text" name="usuario" id="usuario" placeholder="Usuario">
			<input type="password" name="clave" id="clave" placeholder="Contraseña">
			<input type="password" name="repetir_clave" id="repetirclave" placeholder="Repetir Contraseña">
			
			<input type="button" id="botonId" value="Registrar Usuario">
		</form>
	
		<script type="text/javascript">
			$(function(){
				$("#botonId").click(function(){
					var cajaUsuario = $("#usuario").val();
					var cajaClave = $("#clave").val();
					var cajaRepetir =$("#repetirclave").val();
				
				$.post('ws/wsUsuarios.php',
				{
					
					WS:"addUsuario",
					usuario:cajaUsuario,
					clave:cajaClave,
					repetirClave:cajaRepetir
					
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