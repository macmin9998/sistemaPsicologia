function validar()
{
	var usuario,clave;
	usuario=document.getElementById("usuario").value;
	clave=document.getElementById("clave").value;

	expresion = /\w+@\w+\.+[a-z]/;

	if(usuario=="" || /^\s+$/.test(usuario)){
		alert("El campo usuario esta vacio");
		return false;
	}

	if(!expresion.test(usuario)){
		alert("Usuario no valido")
		return false;
	}

	if(clave=="" || /^\s+$/.test(clave)){
		alert("El campo contraseña esta vacio");
		return false;
	}


}