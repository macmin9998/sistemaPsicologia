<!DOCTYPE html>
<html>
	<head>
		<title>Tipo de Examen</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css">
		<link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
		<link rel="stylesheet" href="css/estilos-tipoExamen.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  		<link rel="stylesheet" href="/resources/demos/style.css">

  		<link rel="stylesheet" href="css/estilos_menu_pagina.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<script src="js/jquery-3.2.1.js"></script>
    	<script src="js/main.js" ></script>
  		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</head>
	<body>
	<?php
        include("inc/menu_pagina.html");
    ?>
		<form class="opcionesExamen">
			<h1>Tipo de examen a crear</h1>
		</form>

		<div class="row around-xs">
    		<div class="col-xs-6">
       			<div class="box">
           			<form action="index1.php" class="opcionesExamen">
						<h2>Preguntas con una respuesta</h2>
						Ejemplo: Seleccione una respuesta
						<br>
						<br>
						<input type="radio" name="radio">Respuesta 1 
						<input type="radio" name="radio">Respuesta 2
						<input type="radio" name="radio">Respuesta 3
						<br>
						<br>
						<center>
							<button id="examenRadio" name="examenRadio" value="1">Crear examen</button>
						</center>
					</form>
        		</div>
        	</div>
        	<div class="col-xs-6">
        		<div class="box">
            		<form action="index1.php" class="opcionesExamen">
						<h2>Preguntas con varias respuesta</h2>
						Ejemplo: Seleccione dos o mas respuesta
						<br>
						<br>
						<input type="checkbox" name="checkbox1">Respuesta 1
						<input type="checkbox" name="checkbox2">Respuesta 2
						<input type="checkbox" name="checkbox3">Respuesta 3
						<br>
						<br>
						<center>
							<button>Crear examen</button>
						</center>
					</form>
        		</div>
    		</div>
   		</div>

		
		<div class="row around-xs">
    		<div class="col-xs-6">
       			<div class="box">
					<form action="index1.php" class="opcionesExamen">
						<h2>Pregunta abierta</h2>
						Ejemplo: Escribe tu respuesta
						<br>
						<br>
						<input type="text" name="text">
						<center>
							<br>
							<button>Crear examen</button>
						</center>
					</form>
				</div>
			</div>
			<div class="col-xs-6">
       			<div class="box">
					<form action="index2.php" class="opcionesExamen">
						<h2>Columnas</h2>
						Ejemplo: Coloca las cajas en el orden que prefieras
						<br>
						<br>
				  		<script>
				  			$( function() {
				   			$( "#sortable" ).sortable();
				   			$( "#sortable" ).disableSelection();
				  			} );
				 		</script>
				 		<center>	
							<ul id="sortable">
					  				<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>

					 				<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>

					  				<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>

					 				<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>

					  				<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>

					  				<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>

					 				<li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
							</ul>
							<br>
							<button>Crear examen</button>
						</center>
					</form>
				</div>
			</div>
		</div>
		

	</body>
</html>