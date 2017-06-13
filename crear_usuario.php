<?php
session_start();
if(isset($_SESSION['sun'])){

	include("includs/conexion.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Crear Usuario</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

		<link rel="stylesheet" href="css/estilos_menu_pagina.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/estilos_usuarios.css">


		<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
		<script src="javascript/main.js" ></script>
		<script src="javascript/validaCrearUsuarios.js" ></script>
	</head>
	<body>
		<?php
		include("menu_pagina.html");
		?>
		<form action="" method="post" onsubmit="return validar()">
			<h2>Crear usuario</h2>
			<input type="text" name="usuario" id="usuario" placeholder="Usuario">
			<input type="password" name="clave" id="clave" placeholder="Contraseña">
			<input type="password" name="repetir_clave" id="repetirclave" placeholder="Repetir Contraseña">
			<input type="submit" value="Crear Usuario" id="boton" name="crear">
		</form>
		<script type="text/javascript">
			$(function(){
				$("#boton").click(function(){
					var cajaUsuario = $("#usuario").val();
					var cajaClave = $("#clave").val();
					var cajaRepetir =$("#repetirclave").val();
				$.post('#',
				{
					WS:"#",
					usurario:cajaUsuario,
					clave:cajaClave,
					repetirClave:cajaRepetir
					},function(Respuesta){
						window.location= window.location;
				},"json");
			});
		});
		</script>
	</body>
</html>