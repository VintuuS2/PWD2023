$(document).ready(function () {
    
    var forms = $(".needs-validation");
    forms.on("submit", function (event) {
        var formulario = this;
    
        $(formulario).addClass('was-validated');

        var botonSubmit = $(".btn-modificar")
        var idUsuario = botonSubmit.data("id");
        var inputNombre = $('#inputnombre' + idUsuario);
        var inputMail = $('#inputmail' + idUsuario);

        // Si los inputs estan desactivados
        if (inputMail.prop('disabled')) {
            // Se activa y modifica los inputs
            inputMail.prop('disabled', false);
            inputMail.addClass('bg-success-subtle');
            inputMail.addClass('border-secondary');
            inputMail.removeClass('bg-white');
            inputMail.removeClass('border-0');

            inputNombre.prop('disabled', false);
            inputNombre.addClass('bg-success-subtle');
            inputNombre.addClass('border-secondary');
            inputNombre.removeClass('bg-white');
            inputNombre.removeClass('border-0');
            // Modifica el botón
            botonSubmit.text('Enviar');
            botonSubmit.addClass('btn-success');
            botonSubmit.removeClass('btn-primary');
            // Se detiene el envio del formulario
            event.preventDefault();
        }
    });

});