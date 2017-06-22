<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Genera cajas</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos_menu_pagina.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <?php
        include("inc/menu_pagina.html");
    ?>

    <center>
	    <form class="wrap">
		    <label>Escribe aqui las	instrucciones:</label><br><input type="text"  id="txtInstruccion" placeholder="instrucciones"><br><br>
		    <label>Cuantas cajas requiere? </label><br><select id="cmbCaja"  onchange="createTexts(this)">
		    <option value="" selected="selected">          </option>
            <?php
                for($i=2; $i<=15;$i++){
                    echo "<option value='$i'>$i</option>";
                }
            ?> 
            </select><br>
            <div></div><br>
            <button type="button"  id="btnGuardar" class="boton">Guardar</button><br>
        <!-- <button type="button"  id="btnAgregar">Agregar serie de cajas</button>-->
        </form>
    </center>
    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <script src="js/main.js" ></script>

    <script type="text/javascript">
        idtxt=0;
        function createTexts(sel) {
            var num = sel.text;
            if( !num ) num = sel.options[sel.selectedIndex].text;
            if( !num ) return;
            num = parseInt( num );
            num = isNaN(num) ? 0 : num;
            sel.value = num;
            var dest = sel.parentNode.getElementsByTagName("div")[0];
            dest.innerHTML = '';
            idtxt=0;
            for( i = 0; i < num; i++ ) {
                idtxt++;
                dest.innerHTML += "<br><input type='text' id='text"+idtxt+"' name="+idtxt+" /><br>";
            }
        }

        $(function(){
            $("#btnGuardar").click(function(){
                var instrucciones = $("#txtInstruccion").val();
                var num = $("#cmbCaja").val();
                var txtId = 0;
                for (var i = 1; i <= num; i++) {
                    txtId++;
                    var txtCaja = $("#text"+txtId).val();
                    

                
                $.post('wsCajas.php',{
                    WS: 'addCajas',
                    instrucciones: instrucciones,
                    num: num,
                    txtCaja : txtCaja
                }, 
                function(Respuesta){
                /*    alert(Respuesta.Mensaje);
                    if(Resouesta.CodMensaje == 100){
                        window.location = window.location;
                    }*/
                    console.log(Respuesta);
                }, "json")};
          })
        });

    </script>
</body>
</html>