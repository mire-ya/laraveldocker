function validate(){
    let valid = true;
    if ($("#evidencia").val().trim()==""){
        alert("Seleccione un PDF con la evidencia");
        valid = false;
    }
    $(".voto").each(function(index,element){
    	if ($(this).val().trim()=="") {
    		alert("Coloque los Votos correspondientes");
    		valid = false;
    	}
    });

    return (valid);
}