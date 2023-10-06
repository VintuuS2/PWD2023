$(document).ready(function () {

    $('#btnAudio').click(function(){
        $('#m')[0].play();
    });

    var forms = $(".needs-validation");
    forms.on("submit", function (event) {

        var formulario = this;

        if (!formulario.checkValidity()) {
            event.preventDefault();
        }
        $(formulario).addClass('was-validated');
        
    });

    $(".needs-validation input[pattern]").on("input", function () {
        var campo = $(this);
        console.log(campo);
        var mensajeError = "";

        if (campo.prop("required") && campo.val() === "") {
            mensajeError = campo.attr("errorVacio");
        } else if (campo.prop("pattern") && !campo[0].checkValidity()) {
            mensajeError = campo.attr("errorPatron");
        }

        if (mensajeError != "") {
            campo.siblings(".invalid-feedback").html(mensajeError);
        } else {
            campo.siblings(".invalid-feedback").hmtl("");
        }
    });

    $("#src").on("change", function () {
        var srcValue = $(this).val();
        var tgtValue = $("#tgt").val();
    
        if (srcValue === tgtValue) {
            // Intercambia los valores directamente
            $("#tgt").val("");
        }
    });
    
    $("#tgt").on("change", function () {
        var tgtValue = $(this).val();
        var srcValue = $("#src").val();
    
        if (tgtValue === srcValue) {
            // Intercambia los valores directamente
            $("#src").val("");
        }
    });

});