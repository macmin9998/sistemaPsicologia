<?php

$tipo =$_GET["tipo"];

?>
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
    	<h1>Examenes Creados</h1>
        
    	<table width="100%" id="idRespuesta" >
        <thead>
            <tr>
                <th >Titulo</th>
                <th >Liga</th>
                <th>Entrar</th>    
            </tr>
        </thead>
        <tbody>
            
        </tbody>

        </table>
            <br>
            <br>
            <br>
            <center>
                <button id="hola" class="boton">Entrar al Examen</button>
            </center>
        </div>
       <input type="hidden" id="hiddenTipo" value="<?php echo $tipo ?>">
        

        <script type="text/javascript">
        
        $(document).ready(function(){
            var cajaTipo = $("#hiddenTipo").val();

            $.post('ws/WsExamen.php',{WS:"getExamen",tipo:cajaTipo},function(Respuesta){

               


                var tbody=$("#idRespuesta tbody");

                    if(Respuesta.Datos.length > 0){
                        for(var i=0; i < Respuesta.Datos.length ; i++){
                            var cont=i+1; 
                             


                            var tr= 

                            "<tr>"+

 
                                "<td class='margenTabla'>"+cont+".- "+

                                    Respuesta.Datos[i].nombre+"</td>"+
                                "<td> "+
                                    Respuesta.Datos[i].url+"</td>"+
                                "<td><input type='radio' name='edad' id='edad2' value="+Respuesta.Datos[i].examenId+">"+" "+
                                    cont+ "</td>"+
                            
                             


                                   
                        
                            "</tr>";
                            tbody.append(tr);
                            

                        }

                    }



                    


            });
        });

        
     $(function(){
        
            $("#hola").click(function () {  
                    
                    var id= $('input:radio[name=edad]:checked').val();

            
                    if(typeof(id) == "undefined") {
                        alert("Falto seleccionar algun examen");

                    }
                    if( !(typeof(id) == "undefined") ){
                        document.location.href = "crea.php?id=" + id;  
                    }

                    
           
            });
        });

            
        
        




        </script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <script src="js/menu_usuario.js" ></script>
</body>
</html>