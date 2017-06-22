
<!DOCTYPE html>
<html>
	<head>
		<title>Formulario de login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
		<link rel="stylesheet" href="css\estilos_login.css">
		<script src="javascript\validarLogin.js"></script>
        <!--LIGA PARA JQUERY -->
		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	</head>
	<body>
		<header>
			<h1>Login<h1>
		</header>
		<form >
			<h2>Iniciar sesión</h2>
			<h4>Introduce tu usuario</h4>
			<input type="text" id="usuario" placeholder="&#128272; usuario" name="usuario">
			<h4>Introduce tu contraseña</h4>
			<input type="password" id="clave" placeholder=" &#128272; contraseña" name="clave">
			<input type="button" value="Ingresar"  id="btnAgregar">
		</form>
		<script type="text/javascript">
			$(function(){
				$("#btnAgregar").click(function(){
					var cajaUsuario = $("#usuario").val();
					var cajaClave = $("#clave").val();
				$.post('ws/wsUsuarios.php',
				{
					WS:"buscarUsuario",
					usuario:cajaUsuario,
					clave:cajaClave

					},function(Respuesta){
						 				
						 				alert(Respuesta.Mensaje);
										if(Respuesta.codMensaje == 100)
												
												window.location.href = "menu_usuario.php";
										else if(Respuesta.codMensaje == 200){
											
										    alert(Respuesta.Datos);	
								        }
				},"json");
			});
		});
		</script>



	</body>
</html>
