function validate(){
    let valid = true;
    if ($("#nombrecompleto").val().trim()==""){
        alert("Introduzca un Nombre para el Candidato");
        valid = false;
    }

	if ($("#foto").val().trim()==""){
        alert("Introduzca una foto");
        valid = false;
    }

    if ($("#perfil").val().trim()==""){
        alert("Introduzca un perfil");
        valid = false;
    }

    return (valid);
}
