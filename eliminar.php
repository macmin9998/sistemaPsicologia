
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

	<title>Examenes Creados</title>
	<link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos_menu_pagina.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">

    <script src="js/jquery-3.2.1.js"></script>

    <script src="javascript/main.js" ></script>

</head>
<body>


    <?php
        include("inc/menu_pagina.html");
    ?>
    
	

    <div class="wrap_lista">
    <select name="tipoE">
       		<option disable selected>Seleciona el tipo de examen</option>
       		<option value="1">Radio botones</option>
       		<option value="2">Check box</option>
       		<option value="3">Text</option>

    </select>

    	<h1>Examenes Creados</h1>
        
    	<table width="100%" id="idRespuesta" >
        <thead>
            <tr>
                <th >Titulo</th>
                <th >Liga</th>
                <th>Eliminar</th>    
            </tr>
        </thead>
        <tbody>

        </tbody>
        

        </table>
            <br>
            <br>
            <br>
            <center>
                <button id="hola" class="boton">Eliminar Examen</button>
            </center>
        </div>

      
       
        

        <script type="text/javascript">
        
        $(document).ready(function(){

           
           $("select[name=tipoE]").change(function(){
            	
            	var cajaTipo= $('select[name=tipoE]').val();
            	

            	

	            $.post('ws/WsExamen.php',{WS:"getExamen",tipo:cajaTipo},function(Respuesta){

	                $("#idRespuesta tbody").empty();
                    

	                var tbody=$("#idRespuesta tbody");

	                    if(Respuesta.Datos.length > 0){
	                        for(var i=0; i < Respuesta.Datos.length ; i++){
	                            var cont=i+1; 
	                             


	                            var tr= 

	                            "<tr>"+

	 
	                                "<td class='margenTabla'>"+cont+".- "+

	                                    Respuesta.Datos[i].nombre+"</td>"+
	                                 "<td><input type=text  class='tam' value='http://psicologia.dev/examen.php?prueba_exam="+Respuesta.Datos[i].url+"'></td> "+


	                                "<td><input type='radio' name='edad' id='edad2' value="+Respuesta.Datos[i].examenId+">"+" "+
	                                    cont+ "</td>"+
	                            
	                             


	                                   
	                        
	                            "</tr>";
	                            tbody.append(tr);
	                            

	                        }

	                    }



	                    


	            }); 

	       });
        });

        
     $(function(){
        
            $("#hola").click(function () {  
                    
                    var id= $('input:radio[name=edad]:checked').val();

            
                    if(typeof(id) == "undefined") {
                        alert("Falto seleccionar algun examen");

                    }
                    if( !(typeof(id) == "undefined") ){

                   		$.post('ws/WsExamen.php',
                    	{
                    		WS:"dellExamen",
                    		idExamen:id
                        
                        },function(Respuesta){

                    		alert(Respuesta.Mensaje);
                    		

                    	},"json");




                    }

                    
           
            });
        });

            
        
        




        </script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <script src="js/menu_usuario.js" ></script>
</body>
</html>