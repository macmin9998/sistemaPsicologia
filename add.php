<?php

$id = $_GET['id'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>.::Prueba </title>
	
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/estilos_menu_pagina.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js" ></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


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
		        	<input type="text" id="txtPregunta" placeholder="Escriba su pregunta" title="Una vez ingresada la pregunta presione enter para guardar">
		        	<!-- <br><div id="divPreguntaAgregada">Pregunta agregada</div>  -->
		        </div>
		        
		        <div class="col-md-6">
		        	
		        	<div id="contenido">

						<label>Opciones :</label>
						<input type='text' id='opcion1' name='name1' placeholder='Opcion 1' title="Ingresa la opcion y guardala">
			
					</div>
					<br>
					
					<button id="addO" class="boton">Guardar Opcion</button>
					
					
		        </div>
            </div>
          
           <center><br><br><button id="regresar" class="btn btn-success">Finalizar/Regresar al Examen </button></center>
            	

	    </div>	
	
			
    


	<script type="text/javascript">
         
         var cont=1;

    $(txtPregunta).css("background-color", "#F5FF9F");
    //$("#divPreguntaAgregada").hide();
    
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
                            //$("#divPreguntaAgregada").show();
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
						alert(Respuesta.Datos);	
					}
					
					
				},"json");
                    
                   
           
            });

       });

        $(function(){
        
            $('#regresar').click(function (){


            	
				
					var mensaje = confirm("¿Seguro que deseas regresar al Examen?");
					
					if (mensaje) {
						alert("¡Examen Guardado!");
						window.location.href = "crea.php?id="+$("#idExamen").val()+ ""; 
						}
						//Detectamos si el usuario denegó el mensaje
					else {
						alert("¡Sigue ingresando preguntas!");
						}
				

            


        	});

        });

       


     
        




		

		






	</script>
	
</body>
</html>