$(document).ready(function () {
    
    var forms = $(".needs-validation");
    forms.on("submit", function (event) {
        $('#btn-itercambiar-idiomas').addClass('mt-4');
        $('#btn-itercambiar-idiomas').removeClass('mt-5');

        var formulario = this;

        if (!formulario.checkValidity()) {
            event.preventDefault();
        } else {
            $('#submit').css('display', 'none');
            $('#loader-container').css('display', '');
            setTimeout(10000)
            forms[0].submit();
        }
        $(formulario).addClass('was-validated');
        document.cookie = "wasValidated="+true;
        
    });

    $(".needs-validation input[pattern]").on("input", function () {
        var campo = $(this);
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

        if ($('#btn-itercambiar-idiomas').hasClass('btn-danger')) {
            $('#btn-itercambiar-idiomas').addClass('btn-light');
            $('#btn-itercambiar-idiomas').removeClass('btn-danger');
        }
        
    
        if (source === target) {
            // Selecciona el valor default
            $("#tgt").val("");
        }
    });
    
    $("#tgt").on("change", function () {
        var target = $(this).val();
        var source = $("#src").val();

        if ($('#btn-itercambiar-idiomas').hasClass('btn-danger')) {
            $('#btn-itercambiar-idiomas').addClass('btn-light');
            $('#btn-itercambiar-idiomas').removeClass('btn-danger');
        }
    
        if (target === source) {
            // Selecciona el valor default
            $("#src").val("");
        }
    });

});