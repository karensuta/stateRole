function validar(){
	var p_nombre, p_apellido, documento, correo;

	p_nombre = document.getElementById("p_nombre").value;
	p_apellido = document.getElementById("p_apellido").value;
	documento = document.getElementById("documento").value;
	correo = document.getElementById("correo").value;

	if (p_nombre === "" || p_apellido === "" || documento === "" || correo === "") {
		alert("Debe llenar todos los campos que tengan este caracter (*)");
		return false;
	}

	
}