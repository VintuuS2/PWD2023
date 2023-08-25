$(document).ready(function(){
    $("#form").submit(function(event){
        event.preventDefault();
        var edad = $("#edad-usuario").val();
        var corte = true;

        if (edad <= 0 || edad === ""){
            $("#span-edad").text("Ingrese un valor correcto");
            corte = false;
        } else {
            $("#span-edad").text("");
        }

        if (corte){
            $("#form")[0].submit();
        }
    });
});