function validate(){
    let valid = true;
    if ($("#ubicacion").val().trim()==""){
        alert("La ubicación de la casilla no puede quedar en vacío");
        valid = false;
    }
    return (valid);
}