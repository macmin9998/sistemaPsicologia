<?php

$id = $_GET['id'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>.::Prueba </title>
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/estilos_menu_pagina.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js" ></script>

	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
-->

</head>
<body>

    <input type="hidden" id="idExamen" value="<?php echo $id?>">
    <input type="hidden" id="idPregunta" >

	<?php
		include("inc/menu_pagina.html");
	?>
		<div class="wrapPreguntas">
			
			<div class="row">
		        <div class="col-md-6">
		            <label>Pregunta :</label>
		            <br>
		            <br>
		        	<input type="text" id="txtPregunta" placeholder="Escriba su pregunta">
		        	<br>
		        </div>
		        <br>
		        <br>
		        <br class="saltoLinea">
		        <div class="col-md-6" >
		        	
		        	<div id="contenido">
		        		<br class="saltoLinea">
						<label>Opciones :</label>
						<br>
						<br>
						<input type='text' id='opcion1' name='name1' placeholder='Opcion 1'>
			
					</div>
					<br>
					
					<button id="addO" class="boton">Guardar Opcion</button>
					
					
		        </div>
            </div>
          
           <center><br><br><button id="regresar" class="botonFinalizar">Finalizar/Regresar al Examen </button></center>
            	

	    </div>	
	
			
    


	<script type="text/javascript">
         
         var cont=1;

    $(txtPregunta).css("background-color", "#F5FF9F");
    
    $( "#txtPregunta" ).focus(function() {

    	
    
     
    });

    var bandera=true;


    $(document).ready(function(){

		

			$("#txtPregunta").change(function(){

	            if(bandera){

				var cajapregunta= $("#txtPregunta").val();
				var cajaIdExamen= $("#idExamen").val();
	            	
				  
					$.post('ws/WsExamen.php',
					{
						WS:"addPregunta",
						pregunta:cajapregunta,
						idExamen:cajaIdExamen

						

					},function(Respuesta){

						alert(Respuesta.Mensaje);
						if(Respuesta.codMensaje==100)
							$(txtPregunta).css("background-color", "#79FA88");

						    $("#txtPregunta").prop('disabled', true);
						    
 							
 						    

                            if(Respuesta.Datos.length > 0){
                             	
                             	for(var i=0; i < Respuesta.Datos.length ; i++)
                            	
                            	
                                $("#idPregunta").val(Respuesta.Datos[i].id);


     						}


		                else if(Respuesta.codMensaje == 200)
		                    alert(Respuesta.Datos); 
						
					},"json");
                
			    bandera=false;
				
				}
		

			

		});

    });



		

		 function ver(cont){

		 	var mac = $('input:text[name=name'+cont+']').val();
	
			 return mac;

		 }

        var bandera2=false;
        $(function(){
        
            $('#addO').click(function (){

                

                var cajaOpcion= ver(cont);
                var cajapregunta = $("#idPregunta").val();
            	
			    
				$.post('ws/WsExamen.php',
				{
					WS:"agregarOpcion",
					opcion:cajaOpcion,
					preguntaId:cajapregunta

					

				},function(Respuesta){

					var conten = $("#contenido");

					alert(Respuesta.Mensaje);
					if(Respuesta.codMensaje==100){
						
						cont++;

						conten.append("<br><br><input type='text' id='opcion"+cont+"' name='name"+cont+"' placeholder='Opcion "+cont+"'>");

					
					}else if(Respuesta.codMensaje==200){
						bandera2=false;
					}
					
					
				},"json");
                    
                   
           
            });

       });

        $(function(){
        
            $('#regresar').click(function (){

            	window.location.href = "crea.php?id="+$("#idExamen").val()+ ""; 


        	});

        });

       


     
        




		

		






	</script>
	
</body>
</html>