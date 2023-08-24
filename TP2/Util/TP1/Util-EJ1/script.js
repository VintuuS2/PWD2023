$(document).ready(function(){
    $("#form").submit(function(event){
        event.preventDefault();
        var numero = $("#numero_form").val(); // Usar .val() para obtener el valor del campo

        if (numero === "") { // Comprobar si el campo está vacío
            $("#span").text("Debe ingresar un valor.");
        } else {
            $("#form")[0].submit();
        }
    });
});