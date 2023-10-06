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
            campo.siblings(".invalid-feedback").text(mensajeError);
        } else {
            campo.siblings(".invalid-feedback").text("");
        }
    });

    $("#src").on("change", function () {
        var source = $(this).val();
        var target = $("#tgt").val();
    
        if (source === target) {
            // Selecciona el valor default
            $("#tgt").val("");
        }
    });
    
    $("#tgt").on("change", function () {
        var target = $(this).val();
        var source = $("#src").val();
    
        if (target === source) {
            // Selecciona el valor default
            $("#src").val("");
        }
    });

});