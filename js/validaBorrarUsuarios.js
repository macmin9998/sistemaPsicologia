function validar(){
	var usuario;
	usuario=document.getElementById("usuario").value;
	/*validaciones para usuario*/
	if(usuario=="" || /^\s+$/.test(usuario)){
		alert("Error debe de introducir un usuario");
		return false;
	}

}