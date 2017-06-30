


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">

	<title>Sistema de encuestas</title>
    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <link rel="stylesheet" href="../css/style2.css">
     <script src="js/autocompletar.js"></script>

      




        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
</head>
    <body>
         <div class="wrap_crea contenedor" id="elemento">

            <table>

               <center>
                    

                    <br>
                            <br>
                           
                            <input type="text" value="1" name="Id" id="id_participante" size='3' placeholder="">
                    <br>

                    <br>
                            <br>
                           
                            <input type="hidden" value="<?php echo $_GET['id']?>" name="Id" id="txtexamenId" size='3' placeholder="Id Examen">
                    <br>
                    
                    <br>
                    Sexo:
                    <select id="txtSexo" placeholder="Sexo">
                        <option value="">Sexo</option>
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
                    <button type="button" id="boton" name="boton">Iniciar Examen</button>
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
                        var idP= Respuesta.Datos[i].id;

                        var label = " ";
                        var input = " ";
                        var idpregunta = " ";
                        var contador = " ";
                        var contadorQ = 1;



                        

                        if(pregunta != pActual){
                            cont++;
                           
                            
                            idpregunta = "<input type='hidden' id='Quiz"+cont+"' value="+idP+"><br>";
                            label = "<label >"+cont+".- "+pregunta+"<label><br>";
                           
                            pActual=pregunta; 
                         }  
                     
                         input = "<input type='radio' id='valor"+cont+"' name='rad"+cont+"' value='"+valorR+"'  "+">"+nombreR+"<br>";
                        
                         contador = "<input type='hidden' id='contador' value='"+cont+"'>"

                         

                         
                          

                          
                       divExamen.append(idpregunta); 
                       divExamen.append(label);
                       divExamen.append(input);
                       
                       
                    }

                     contadorQ = "<input type='text' id='contadorQ' value='"+cont+"'>"

                    divExamen.append(contador);
                    divExamen.append(contadorQ);
                }
                else{
                        console.log("estoy en el else");
                }
                        
                    console.log(Respuesta);
                },
                "json");                
            });
             

        });


           $(function(){
       $("#btnfinalizar").click(function(){
           var id_participante= $("#id_participante").val();
           var examenId= $("#txtexamenId").val();
           var contador = $("#contador").val();
           var idPreg = 0;


           for (var i = 1; i<= contador; i++){
               
               idPreg++;
               var idPregunta = $("#Quiz"+idPreg).val();

               
               var rdb = $("#valor"+idPreg).val();
               
               alert(rdb);

               $.post('ws/wsExamenP.php',{
                   WS: 'insertQuiz',
                   id_participante: id_participante,
                   examenId: examenId,
                   idPreg: idPregunta,
                   valor: rdb
               },
               function(Respuesta){
                   alert(Respuesta.Mensaje);
                   if (Respuesta.CodeMensaje == 100){
                       window.location = window.location;
                   }
               
               }, "json")};
       })
   });

      </script>

      <br>
                    <button type="button" id="btnfinalizar" name="btnfinalizar">terminar examen</button>
</body>


</html>