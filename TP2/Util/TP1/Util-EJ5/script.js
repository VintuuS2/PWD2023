$(document).ready(function(){
    $("#form").submit(function(event){
        event.preventDefault();
        var nombre = $("#nombre-usuario").val();
        var apellido = $("#apellido-usuario").val();
        var edad = $("#edad-usuario").val();
        var direccion = $("#direccion-usuario").val();
        var genero = $("#genero-usuario").val();
        var estudios = $("#estudios-usuario")
        var corte = true;

        if (nombre === ""){
            $("#span-nombre").text("Ingrese un nombre válido");
            corte = false;
        } else {
            $("#span-nombre").text("");
        }

        if (apellido === ""){
            $("#span-apellido").text("Ingrese un apellido válido");
            corte = false;
        } else {
            $("#span-apellido").text("");
        }
        
        if (edad === "" || edad<0){
            $("#span-edad").text("Ingrese una edad válida");
            corte = false;
        } else {
            $("#span-edad").text("");
        }

        if (direccion === ""){
            $("#span-direccion").text("Ingrese una direccion válida");
            corte = false;
        } else {
            $("#span-direccion").text("");
        }

        if (estudios === ""){
            $("#span-estudios").text("Ingrese una opción válida");
            corte = false;
        } else {
            $("#span-estudios").text("");
        }

        if (genero === ""){
            $("#span-genero").text("Ingrese una opción válida");
            corte = false;
        } else {
            $("#span-genero").text("");
        }

        if (corte){
            $("#form")[0].submit();
        }
    })
});