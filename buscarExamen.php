<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title>Buscar Examen</title>

	<script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <link rel="stylesheet" href="../css/style2.css">
</head>
<body>

    


	
    <div>
        <table id="tblRespuesta" border="1" width="100%">
            
            <h1 align="center">Examen Radio Boton</h1>
            <tr>
                <th>Nombre de Examen</th>
                <th>URL</th>


            

              
                
            </tr>
        </table>



    </div>


    
    <div>
        <table id="tblRespuesta1" border="1" width="100%">
            
            <h1 align="center">Examen Pregunta Abierta</h1>
            <tr>
                <th>Nombre de Examen</th>
                <th>URL</th>


            

              
                
            </tr>
        </table>



    </div>

    <div>
        <table id="tblRespuesta2" border="1" width="100%">
            
            <h1 align="center">Examen Pregunta Seleccion</h1>
            <tr>
                <th>Nombre de Examen</th>
                <th>URL</th>


            

              
                
            </tr>
        </table>



    </div>




    <script type="text/javascript">



   


    $(document).ready(function(){

        var nombre = $("#txtNombre tbody");
        var url = $("#txtUrl tbody");
        var examenId = $("#txtexamId tbody")
       
    

        
        $.ajax({
            url:"ws/wsExamenP.php",
            data:{WS: "getExamenV1"},
            type:"post",
            dataType:"json",
            async:true,

              


            success:function(Respuesta){
                var tbody = $("#tblRespuesta tbody");
                
                var data =JSON.stringify(Respuesta);
             
                if(Respuesta.CodeMensaje == 200)
                    return false;

                if(Respuesta.Datos.length > 0){
                    for(var i =0 ; i<Respuesta.Datos.length;i++){
                        var tr = "<tr>"+
                       
                          "<td><a href='examen.php?id="+Respuesta.Datos[i].examenId+"'"+Respuesta.Datos[i].url+"'>"+Respuesta.Datos[i].nombre+"</a></td>"+
                          "<td>"+Respuesta.Datos[i].url+"</td> "+


                          

                          
                        "<tr>";
                        tbody.append(tr);
                    }
                }
                else{
                        console.log("estoy en el else");
                }
            },
            error:function(){

            }
        });
    });



    $(document).ready(function(){

        var nombre = $("#txtNombre tbody");
        var url = $("#txtUrl tbody");
        var examenId = $("#txtexamId tbody")
       
    

        
        $.ajax({
            url:"ws/wsExamenP.php",
            data:{WS: "getExamenV2"},
            type:"post",
            dataType:"json",
            async:true,

              


            success:function(Respuesta){
                var tbody = $("#tblRespuesta1 tbody");
                
                var data =JSON.stringify(Respuesta);
             
                if(Respuesta.CodeMensaje == 200)
                    return false;

                if(Respuesta.Datos.length > 0){
                    for(var i =0 ; i<Respuesta.Datos.length;i++){
                        var tr = "<tr>"+
                       
                          "<td><a href='examen1.php?id="+Respuesta.Datos[i].examenId+"'"+Respuesta.Datos[i].url+"'>"+Respuesta.Datos[i].nombre+"</a></td>"+
                          "<td>"+Respuesta.Datos[i].url+"</td> "+


                          

                          
                        "<tr>";
                        tbody.append(tr);
                    }
                }
                else{
                        console.log("estoy en el else");
                }
            },
            error:function(){

            }
        });
    });


    $(document).ready(function(){

        var nombre = $("#txtNombre tbody");
        var url = $("#txtUrl tbody");
        var examenId = $("#txtexamId tbody")
       
    

        
        $.ajax({
            url:"ws/wsExamenP.php",
            data:{WS: "getExamenV3"},
            type:"post",
            dataType:"json",
            async:true,

              


            success:function(Respuesta){
                var tbody = $("#tblRespuesta2 tbody");
                
                var data =JSON.stringify(Respuesta);
             
                if(Respuesta.CodeMensaje == 200)
                    return false;

                if(Respuesta.Datos.length > 0){
                    for(var i =0 ; i<Respuesta.Datos.length;i++){
                        var tr = "<tr>"+
                       
                          "<td><a href='examen2.php?id="+Respuesta.Datos[i].examenId+"'"+Respuesta.Datos[i].url+"'>"+Respuesta.Datos[i].nombre+"</a></td>"+
                          "<td>"+Respuesta.Datos[i].url+"</td> "+


                          

                          
                        "<tr>";
                        tbody.append(tr);
                    }
                }
                else{
                        console.log("estoy en el else");
                }
            },
            error:function(){

            }
        });
    });




    		


    </script> 
</body>
</html>