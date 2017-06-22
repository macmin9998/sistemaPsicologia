<?php


$id = $_GET['id'];



?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

	<title>Sistema de encuestas</title>

	<link rel="stylesheet" href="css/estilos_menu_pagina.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos.css">

	<script src="js/jquery-3.2.1.js"></script>

    <script src="javascript/main.js" ></script>
	
</head>
<body>
    <input type="hidden" id="idOculto" value="<?php echo $id; ?>">

	<?php
       // include("menu_pagina.html");
    ?>

    <div class="wrap_crea">
    	<h1>Crea preguntas del examen: <div id="nombreDiv"> </div> </h1>
    	
        <div id="nombreDiv2">
            
            
        
        </div>
    

    <script type="text/javascript">
         $(document).ready(function(){

            var cajaId = $("#idOculto").val();

            $.post('ws/WsExamen.php',{

                WS:"getMuestra",
                id:cajaId

            },function(Respuesta){


                var tbody=$("#nombreDiv");


                if(Respuesta.Datos.length > 0){ 

                    for(var i=0; i < Respuesta.Datos.length ; i++){
                            
                    

                        var tr="<div> "+
                            Respuesta.Datos[i].nombre+

                           
                            "</div>";
                        tbody.append(tr);
                            

                     
                            

                        }
                }           
            


            });
        });   

         $(document).ready(function(){

            var cajaId = $("#idOculto").val();

            $.post('ws/WsExamen.php',{

                WS:"muestraContenido",
                id:cajaId

            },function(Respuesta){


                var tbody=$("#nombreDiv2");
               

                if(Respuesta.Datos.length > 0){ 

                    var  actual;
                    var ant;
                    

                    for(var i=0; i < Respuesta.Datos.length ; i++){
                       
                        actual = Respuesta.Datos[i].titulo;

                        if(actual != ant ){
                        
                        tbody.append("<h2>"+Respuesta.Datos[i].titulo+"</h2>");
                          
                        ant= Respuesta.Datos[i].titulo;
                        }

                        if(Respuesta.Datos[i].tipo == 1){
   
                            tbody.append("<br/><input type='radio' name='radio"+Respuesta.Datos[i].tipo+"'>"+Respuesta.Datos[i].nombreO);
                        }
                        
                        

                        

                                   
                            
                        
                            

                        }
                }           
            


            });
        });     

         


    </script>
</body>
</html>