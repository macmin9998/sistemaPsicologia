<?php
session_start();
if(isset($_SESSION['sun'])){


	

	include("includs/conexion.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Modificar Usario</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

		<link rel="stylesheet" href="css/estilos_menu_pagina.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estilos_usuarios.css">

		<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
		<script src="javascript/main.js" ></script>
		<script src="javascript/validaModificarUsuario.js" ></script>


	</head>
	<body>

		<?php
		include("menu_pagina.html");
		?>
		<form action="" method="post" onsubmit="return validar()">
			<h2>Modificar Usuario</h2>
			<input type="text" name="usuario" id="usuario" placeholder="Usuario a modificar">
			<input type="text" name="nuevo_usuario" id="nuevoUsuario" placeholder="Nuevo Usuario">
			<input type="password" name="nueva_clave" id="clave" placeholder="Nueva Clave">
			<input type="submit" value="Modificar Usuario" id="boton" name="modificar">
		</form>
		<script type="text/javascript">
			$(function(){
				$("#boton").click(function(){
					var cajaUsuario = $("#usuario").val();
					var cajaNuevoUsuario = $("#nuevoUsuario").val();
					var cajaClave =$("#clave").val();
				$.post('#',
				{
					WS:"#",
					usurario:cajaUsuario,
					nuevoUsuario:cajaNuevoUsuario,
					clave:cajaClave
					},function(Respuesta){
						window.location= window.location;
				},"json");
			});
		});
		</script>

	</body>
</html>