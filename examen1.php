<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

	<title>Sistema de encuestas</title>
    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <link rel="stylesheet" href="css/estilosExamenes.css">
     <script src="js/autocompletar.js"></script>
</head>
    <body>
         <div class="wrap" id="elemento">

            <table>

               <center>

                    <br>
                            <br>
                           
                            <input type="hidden" value="<?php echo $_GET['id']?>" name="Id" id="txtexamenId" size='3' placeholder="Id Examen">
                    <br>
                    
                    <br>
                    Sexo:
                    <select id="txtSexo" placeholder="Sexo">
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                    </select>

                    <br>
                            <br>Edad:
                            <input type="text" name="edad" id="txtEdad" size='3' placeholder="Edad">
                    <br>

                    <br>
                    Escolaridad:
                    <select id="txtEscolaridad" placeholder="Escolaridad">
                        <option value="Primaria">Primaria</option>
                        <option value="Secuandaria">Secundaria</option>
                        <option value="Bachillerato">Bachillerato</option>
                        <option value="Educación Superior">Educación Superior</option>                 
                    </select>

                    <br>
                    <br>
                    <div>
                        <label for="tags">Ciudad De Origen: </label>
                        <input id="txtCiudad" class="ui-autocomplete-input" placeholder="Ciudad">
                    </div>
                    <br>
                    <button type="button" class="boton" id="boton" name="boton">Iniciar Examen</button>
                </center>
                <tr>
                    
            </table>
    	
	</div>

    <div id="examen">


        

    </div>



    <script>



          
           $(function(){

            $("#boton").click(function(){
                
                var examenId = $("#txtexamenId").val();
                var sexo= $("#txtSexo").val();
                var edad= $("#txtEdad").val();
                var escolaridad = $("#txtEscolaridad").val();
                var ciudad = $("#txtCiudad").val();
              
                

               
                $.post("ws/wsExamenP.php",
                        {
                        
                        WS:"insertParticipante",
                        examenId:examenId,
                        sexo:sexo,
                        edad:edad,
                        escolaridad:escolaridad,
                        ciudad:ciudad
                        


                        },
                function(Respuesta){
                        
                    console.log(Respuesta);
                },
                "json");                
            });
    });




           $(document).ready(function(){
             $("#boton").click(function(){
                $("#Cuestionario1").show();
                $("#elemento").hide();
                var examenId = $("#txtexamenId").val();


                 alert(examenId);

                   $.post("ws/wsExamenP.php",
                        {
                        
                        WS:"getExamenAp",

                        examenId:examenId

                      
                        


                        },
                function(Respuesta){

                     var divExamen = $("#examen");
                     var cont=0;
                     var pActual="";
               
                
                var data =JSON.stringify(Respuesta);
             
                if(Respuesta.CodeMensaje == 200)
                    return false;



              

                if(Respuesta.Datos.length > 0){
                    for(var i =0 ; i<Respuesta.Datos.length;i++){
                        var pregunta = Respuesta.Datos[i].titulo;
                        var valorR= Respuesta.Datos[i].valor;
                        var nombreR= Respuesta.Datos[i].nombreO;

                        var label = " ";
                        var input = " ";
                       
                        if(pregunta != pActual){
                            cont++;
                            label = "<label>"+cont+".- "+pregunta+"<label><br>";
                           
                            pActual=pregunta; 
                         }  
                     
                         input = "<input type='text' name='text"+cont+"'   "+"><br>";

                          

                          
                       
                       divExamen.append(label);
                       divExamen.append(input);
                    }
                }
                else{
                        console.log("estoy en el else");
                }
                        
                    console.log(Respuesta);
                },
                "json");                
            });


           
             

           });

      </script>
</body>


</html>