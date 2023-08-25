$(document).ready(function(){
    $("#form").submit(function(event){
        event.preventDefault();
        var num1 = $("#primer-numero").val();
        var num2 = $("#segundo-numero").val();
        var corte = true;

        if (num1===""){
            $("#span-primer").text("Debe ingresar un valor");
            corte = false;
        } else {
            $("#span-primer").text("");
        }

        if (num2 === ""){
            $("#span-segundo").text("Debe ingresar un valor");
            corte = false;
        } else {
            $("#span-segundo").text("");
        }

        if (corte){
            $("#form")[0].submit();
        }
    });
});