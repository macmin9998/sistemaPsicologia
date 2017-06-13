function validar(){
	var usuario;
	var clave;
	usuario=document.getElementById("usuario").value;
	clave=document.getElementById("clave").value;
	repetirClave=document.getElementById("repetir_clave").value;
	/*validaciones para usuario*/
	if(usuario=="" || /^\s+$/.test(usuario)){
		alert("Error debe de introducir un usuario");
		return false;
	}

	/*validaciones para clave */
	if(clave=="" || /^\s+$/.test(clave)){
		alert("Error debe de introducir una clave");
		return false;
	}

	if(clave!=repetirClave) 
	{
  		alert("Error las contraseñas no son iguales");
		return false;
	}



}