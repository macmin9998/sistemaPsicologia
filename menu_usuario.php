
<!--<?php
//session_start();

//if(isset($_SESSION['sun'])){ 
?>
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Menu</title>
		<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
		<link rel="stylesheet" href="css/estilos_menu_usuario.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
		<script src="js/menu_usuario.js" ></script>

	</head>
	<body>

		<header>
			<h1>MENÚ USUARIOS</h1>
		</header>

		<ul id="accordion" class="accordion">
			<li>
				<div class="link"><i class="fa fa-file-text-o"></i>Examen<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu">
						<li><a href="tipoExamen.php">Crear</a></li>
						<li><a href="eliminar.php">Eliminar</a></li>
						<li><a href="buscarExamen.php">Lista de Exámenes</a></li>
					</ul>
			</li>

			<li>
				<div class="link"><i class="fa fa-pencil-square-o"></i>Editar<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu">
						<li><a href="#">Nombre de examen</a></li>
						<li><a href="#">Pregunta</a></li>
						<li><a href="#">Respuesta</a></li>
					</ul>
			</li>

			<li>
				<div class="link"><i class="fa fa-user-o"></i>Usuario<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu">
						<li><a href="crear_usuario.php">Crear</a></li>
						<li><a href="borrar_usuario.php">Borrar</a></li>
						<li><a href="modificar_usuario.php">Modificar</a></li>
					</ul>
			</li>

			<li>
				<div class="link"><i class="fa fa-address-card"></i>Sesión<i class="fa fa-chevron-down"></i></div>
					<ul class="submenu">
						<li><a href="close.php">Cerrar Sesión</a></li>
					</ul>
			</li>
		</ul>
<!--		
<?php

//}else{
//	echo"no hay sesion";


?>
-->

	</body>



</html>