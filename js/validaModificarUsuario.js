function validar(){
	var usuario;
	var nuevoUsuario;
	var clave;

	usuario=document.getElementById("usuario").value;
	nuevoUsuario=document.getElementById("nuevo_usuario").value;
	clave=document.getElementById("clave").value;
	/*validaciones para usuario*/
	if(usuario=="" || /^\s+$/.test(usuario)){
		alert("Error debe de introducir un usuario");
		return false;
	}

	if(nuevoUsuario=="" || /^\s+$/.test(nuevoUsuario)){
		alert("Error debe de introducir un nuevo usuario");
		return false;
	}

	if(usuario==nuevoUsuario){
		alert("Error el usuario nuevo tiene que ser diferente al anterior");
		return false;
	}



	if(clave=="" || /^\s+$/.test(clave)){
		alert("Error debe de introducir una contraseña");
		return false;
	}

}