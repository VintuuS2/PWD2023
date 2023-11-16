$(document).ready(function () {
    var forms = $(".needs-validation");
    var alertPlaceholder = $('#liveAlertPlaceholder');
    const alert = (message, type) => {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')
        alertPlaceholder.append(wrapper)
    }

    forms.on("submit", function (event) {

        // Recibo el formulario que esta en dentro del submit
        var formulario = this;
        $(formulario).addClass('was-validated');

        var botonSubmit = $('#btnenviar'); 
        var inputNombre = $('#usnombre');
        var inputMail = $('#usmail');
        var inputContrasenia = $('#uspass');


        // Si los inputs ya estan activados, valida su contenido y manda el formulario
        if (!(inputMail.prop('disabled') || inputNombre.prop('disabled'))) {
            var comienzoMensaje = "<i class='fas fa-exclamation-triangle pe-2'></i><b>Error</b>: ";
            var nombreUsuarioNuevo = inputNombre.val();
            var mailUsuarioNuevo = inputMail.val();
            var usernameIncorrecto = false;
            var emailIncorrecto = false;


            if (usernameIncorrecto || emailIncorrecto) {
                // detiene el envio del formulario
                event.preventDefault();
                if (usernameIncorrecto) {
                    inputNombre.addClass('border-danger');
                    inputNombre.addClass('is-invalid');
                } else {
                    inputNombre.removeClass('border-danger');
                    inputNombre.removeClass('is-invalid');
                    inputNombre.addClass('border-success');
                    inputNombre.addClass('is-valid');
                }
                if (emailIncorrecto) {
                    inputMail.addClass('border-danger');
                    inputMail.addClass('is-invalid');
                } else {
                    inputMail.removeClass('border-danger');
                    inputMail.removeClass('is-invalid');
                    inputMail.addClass('border-success');
                    inputMail.addClass('is-valid');
                }
            }
        }
    });

    function validarEmail(email) {
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (email.match(validRegex)) {
            return true;
        } else {
            return false;
        }
      }
});