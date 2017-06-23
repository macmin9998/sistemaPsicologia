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
		<div class="wrap">
			<center>
				<input type="text" id="txtPregunta" placeholder="Escriba su pregunta">
				<!--
				<select id="selectId">
					<option value="" disabled selected>Numero de Opciones</option>
				</select>
				-->
				<br/>
			
				<div id="contenido">
		
				</div>
				<br>
				<br>
				<button id="addO" class="boton">agregar opciones</button>
				<button id="hola" class="boton">guardar </button>
				<br>
	    		<button id="hola1" class="boton">ver contenido</button>
	    	</center>
	    </div>	
    


	<script type="text/javascript">

	$(document).ready(function() {

		$('#hola').hide(); 
		

    });



    function ver(){
    	$('#hola').show();

     
    }

        /*
		$(document).ready(function() {
            
            var selectAdd = $("#selectId");
            

            


            for(var i=2; i <=10; i++){

            	var op ="<option>"+i+"</option>";
            
            	selectAdd.append(op);
            

            }
 
        

        });   */
 
       /* $(document).ready(function(){

            var conten = $("#contenido");

			
			$("#selectId").change(function(){

				   
                    $("#contenido").empty();

		            var valor= $('select[id=selectId]').val();
      
      				for(var i=1; i <= valor; i++){
                        
		            	conten.append("<br><input type='text' id='opcion"+i+"' name='name"+i+"' placeholder='Opcion "+i+"'><br>");

		            }
            ver();
            
			});
			
		});*/


		 $(document).ready(function(){

            var conten = $("#contenido");
            var cont=1;
			
			$("#addO").click(function (){

				   
        
                        
		            	conten.append("<br><input type='text' id='opcion"+cont+"' name='name"+cont+"' placeholder='Opcion "+cont+"'><br>");
            cont++;
		            
          
            
			});
			
		});

  
  		$(document).ready(function(){
            var cont=1;

  			 $("#hola1").click(function (){

  			 	alert("mostrar contenido");
                var mac = $('input:text[name=name'+cont+']').val();
                alert(mac);
                cont++;


        	});
  		


  		});
        
         function lleva (){
    	     
            var cont=1;
            var mac = $('input:text[name=name'+cont+']').val();

            cont++;

             return mac;

        }


		




    
     $(function(){
        
            $("#addO").click(function (){

            	
                var cajaOpcion=lleva();
            	
			
				$.post('',
				{
					WS:"guardarPregunta",
					opcion:cajaOpcion
					

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