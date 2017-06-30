<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Acomoda las cajas</title>
	 <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_menu_pagina.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
<?php
include("inc/menu_pagina.html");
?>
<div class="wrap">
 <input type="hidden" id="textUrl" value="<?php echo $_GET['prueba_exam']?>">
<div id="origen" ondragenter="return dragEnter(event)" ondragover="return dragOver(event)" ondrop="return drop(event)"></div>
<div id="destino"  ondragenter="return dragEnter(event)" ondragover="return dragOver(event)" ondrop="return drop(event)">ARRASTRAR AQUI</div>
<br>
 <button type="button"  id="btnGuardar" class="boton">Guardar</button><br>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$.post('ws/wsDragDrop.php',{
			WS:'getCajas'
		}, 
		function(Respuesta){
			var divOrigen = $("#origen");
			var id=0;

			if(Respuesta.length > 0){
				for (var i=0; i <Respuesta.length; i++) {
					var textoCaja = Respuesta[i].texto_caja;
					id++;
					var div = "<div id='arrastrable"+id+"' draggable='true' ondragstart='return dragStart(event)' ondragend='return dragEnd(event)'>"+textoCaja+"</div>";
					divOrigen.append(div); 
					};
				};
			});
	});


//****pertenece al objeto a arrastrar
            //******dragStart desencadena un evento cuando comenzamos a arrastrar el elemento 
            function dragStart(e){
                e.dataTransfer.effectAllowed = 'move';//dataTransfer que informacion vamos a compartir
                //setData declara que datos seran transferidos se aplica a lo que arrastraremos
                e.dataTransfer.setData("Data", e.target.getAttribute('id'));//e.target que objeto a desencadenado wel elemento
                e.dataTransfer.setDragImage(e.target, 0, 0);
                return true;                    
            }
            //****Cuando el elemento esta en la zona de destino
            function dragEnter(e){
                return true;
            }
            //*** lado destino cuando el mouse con el elemento se mueve en la zona del destino
            function dragOver(e){
            //  var esarrastrable = e.dataTransfer.getData("Data");//getData declara que datos seran capturados
            var id = e.target.getAttribute('id');
            if (id == 'destino'){
                return false;
            }
               
            }
            
            //****drop cuando el elemento es soltado en la zona de destino
            function drop(e){
                var esarrastrable = e.dataTransfer.getData("Data");
                e.target.appendChild(document.getElementById(esarrastrable));
               // e.stopPropagation();
                return false;
            }
            //***es del lado del elemento desencadena la accion cuando dejamos de arrastrar el elemento
            function dragEnd(e){
                e.dataTransfer.clearData("Data");//va a quitar los div del primer div que los contiene 
                return true
            }      
</script>
</body>
</html>