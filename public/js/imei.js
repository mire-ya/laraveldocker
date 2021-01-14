function validate(){
    let valid = true;
    if ($("#imei").val().trim()==""){
        alert("Anote un IMEI!");
        valid = false;
    }
    return (valid);
}