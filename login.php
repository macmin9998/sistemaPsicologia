
<?php
	include("includs/conexion.php");
 	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
		<link rel="stylesheet" href="css\estilos_login.css">
		<script src="javascript\validarLogin.js"></script>
	</head>
	<body>
		<header>
			<h1>Login<h1>
		</header>
		<form method="post" onsubmit="return validar();">
			<h2>Iniciar sesión</h2>
			<h4>Introduce tu usuario</h4>
			<input type="text" id="usuario" placeholder="&#128272; usuario" name="usuario">
			<h4>Introduce tu contraseña</h4>
			<input type="password" id="clave" placeholder=" &#128272; contraseña" name="clave">
			<input type="submit" value="Ingresar" name="ingresar" id="btnAgregar">
		</form>
		<script type="text/javascript">
			$(function(){
				$("#btnAgregar").click(function(){
					var cajaUsuario = $("#usuario").val();
					var cajaClave = $("#clave").val();
				$.post('#',
				{
					WS:"#",
					usurario:cajaUsuario,
					clave:cajaClave
					},function(Respuesta){
						window.location= window.location;
				},"json");
			});
		});
		</script>



	</body>
</html>
