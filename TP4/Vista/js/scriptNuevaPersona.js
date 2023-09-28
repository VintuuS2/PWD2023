
$(document).ready(function () {
    var forms = $(".needs-validation");
    forms.on("submit", function (event) {
        var formulario = this;

        if (!formulario.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        $(formulario).addClass("was-validated");
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
});