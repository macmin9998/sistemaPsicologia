<!DOCTYPE html>
<html>
<head>
	<title>.::Prueba </title>

	<script src="js/jquery-3.2.1.js"></script>

</head>
<body>

	<input type="text" id="txtPregunta" placeholder="Escriba su pregunta">
	<select id="selectId">
		 <option value="" disabled selected>Numero de Opciones</option>
		
	</select>
	<br/>
	<div id="contenido">
		
	</div>

	<button id="hola">hey</button>


    


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