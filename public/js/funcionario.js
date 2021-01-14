function validate(){
    let valid = true;
    if ($("#nombrecompleto").val().trim()==""){
        alert("Introduzca el Nombre Completo del Funcionario");
        valid = false;
    }

    if ($("#sexo").val().trim() ==""){
        alert("Seleccione el sexo del Funcionario");
        valid = false;
    }

    return (valid);
}