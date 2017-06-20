<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

	<title>Examenes Creados</title>
	
    <link rel="stylesheet" href="css/estilos_menu_pagina.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">

    <script src="js/jquery-3.2.1.js"></script>

    <script src="javascript/main.js" ></script>

</head>
<body>


    <?php
        //include("menu_pagina.html");
    ?>
    <div class="wrap">
    	<h1>Examenes Creados</h1>

    	<table width="100%" id="idRespuesta" class="table table-hover">
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

            <button id="hola">Entrar al Examen</button>

        </div>
       
        

        <script type="text/javascript">
        
        $(document).ready(function(){
 
            $.post('ws/WsExamen.php',{WS:"getExamen"},function(Respuesta){

               


                var tbody=$("#idRespuesta tbody");

                    if(Respuesta.Datos.length > 0){
                        for(var i=0; i < Respuesta.Datos.length ; i++){
                            
                             


                            var tr= 

                            "<tr>"+
                                "<td>"+
                                    Respuesta.Datos[i].nombre+"</td>"+
                                "<td> "+
                                    Respuesta.Datos[i].url+"</td>"+
                                "<td><input type='radio' name='edad' id='edad2' value="+Respuesta.Datos[i].examenId+">"+
                                    Respuesta.Datos[i].examenId + "</td>"+

                             


                                   
                        
                            "</tr>";
                            tbody.append(tr);
                           

                        }

                    }



                    


            });
        });

        
        $(document).ready(function(){
        
            $("#hola").click(function () {  
                    alert($('input:radio[name=edad]:checked').val());
                    var id= $('input:radio[name=edad]:checked').val();

                    document.location.href = "probarId.php?id=" + id;
           
            });
        });

            
        
        




        </script>

</body>
</html>