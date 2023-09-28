
$(document).ready(function () {
    var forms = $(".needs-validation");

    forms.on('submit', function (event) {
        var formulario = this;

        if (!formulario.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        $(formulario).addClass("was-validated");
    });
    $(".needs-validation input[pattern]").on("input", function () {
        var input = $(this);
        var mensajeError = "";

        if (input.prop("required") && input.val() === "") {
            mensajeError = input.attr("errorVacio");
        } else if (input.prop("pattern") && !input[0].checkValidity()) {
            mensajeError = input.attr("errorPatron");
        }
        if (mensajeError != "") {
            $(".text-danger").text(mensajeError);
        } else {
            $(".text-danger").html("");
        }
    });
})