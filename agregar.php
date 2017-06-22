<!DOCTYPE html>
<html>
<head>
	<title>.::Prueba </title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/estilos_menu_pagina.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js" ></script>

</head>
<body>
	<?php
		include("inc/menu_pagina.html");
	?>
	<form class="wrap">
		<input type="text" id="txtPregunta" placeholder="Escriba su pregunta">
		<select id="selectId">
			<option value="" disabled selected>Numero de Opciones</option>
		</select>
		<br/>
		<center>
			<div id="contenido">
		
			</div>
			<br>
			<br>
			<button id="hola" class="boton">hey</button>
		</center>
	</form>
		
    


	<script type="text/javascript">

	$(document).ready(function() {

		$('#hola').hide(); 
		

    });



    function ver(){
    	$('#hola').show();

     
    }


		$(document).ready(function() {
            
            var selectAdd = $("#selectId");
            

            


            for(var i=2; i <=10; i++){

            	var op ="<option>"+i+"</option>";
            
            	selectAdd.append(op);
            

            }
 
        

        });


        $(document).ready(function(){

            var conten = $("#contenido");

			
			$("#selectId").change(function(){

				   
                    $("#contenido").empty();

		            var valor= $('select[id=selectId]').val();
      
      				for(var i=1; i <= valor; i++){
                        
		            	conten.append("<br><input type='text' id='opcion"+i+"' placeholder='Opcion "+i+"'><br>");

		            }
            ver();
            
			});
			
		});





     $(function(){
        
            $("#hola").click(function (){

            	alert("si intenta guardar");

            	
			
				$.post('',
				{
					WS:"guardarPregunta",
					

				},function(Respuesta){

					alert(Respuesta.Mensaje);
					if(Respuesta.codMensaje==100)
						window.location.href = "Lista.php";
	                else if(Respuesta.codMensaje == 200)
	                    alert(Respuesta.Datos); 
					
				},"json");
                    
                   
           
            });

       });



        




		

		






	</script>
	
</body>
</html>