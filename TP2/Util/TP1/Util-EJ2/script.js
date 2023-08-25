$(document).ready(function(){
    $("#form").submit(function(event){
        event.preventDefault();
        var hLunes = $("#lunes-form").val();
        var hMartes = $("#martes-form").val();
        var hMiercoles = $("#miercoles-form").val();
        var hJueves = $("#jueves-form").val();
        var hViernes = $("#viernes-form").val();
        var corte = true;

        if (hLunes === ""){
            $("#span-lunes").text("Ingrese un valor");
            corte = false
        } else {
            $("#span-lunes").text("");
        }

        if (hMartes === ""){
            $("#span-martes").text("Ingrese un valor");
            corte = false
        } else {
            $("#span-martes").text("");
        }

        if (hMiercoles === ""){
            $("#span-miercoles").text("Ingrese un valor");
            corte = false
        } else {
            $("#span-miercoles").text("");
        }

        if (hJueves === ""){
            $("#span-jueves").text("Ingrese un valor");
            corte = false
        } else {
            $("#span-jueves").text("");
        }

        if (hViernes === ""){
            $("#span-viernes").text("Ingrese un valor");
            corte = false
        } else {
            $("#span-viernes").text("");
        }
       
        if (corte){
            $("#form")[0].submit();
        }
    })
});