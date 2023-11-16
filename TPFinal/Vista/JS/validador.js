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
        var formulario = this;
        $(formulario).addClass('was-validated');
        var idUsuario = $(this).data("id");

        var botonSubmit = $('#btn-modificar-' + idUsuario);
        console.log(botonSubmit);
        var inputNombre = $('#inputnombre' + idUsuario);
        var inputMail = $('#inputmail' + idUsuario);

        // Si los inputs estan desactivados
        if (inputMail.prop('disabled') || inputNombre.prop('disabled')) {
            var tdBotones = $('#columnaBotones' + idUsuario);
            // Se activan y modifican los inputs
            inputMail.prop('disabled', false);
            inputMail.addClass('bg-success-subtle');
            inputMail.addClass('border-secondary');
            inputMail.removeClass('border-0');

            inputNombre.prop('disabled', false);
            inputNombre.addClass('bg-success-subtle');
            inputNombre.addClass('border-secondary');
            inputNombre.removeClass('border-0');
            // Deshabilita todos los otros botones
            $('.btn-modificar').each(function() {
                $(this).prop('disabled', true);
            });
            // Modifica el botón para enviar los datos
            botonSubmit.html('<i class="fa-regular fa-paper-plane"></i>');
            botonSubmit.addClass('btn-success');
            botonSubmit.removeClass('btn-primary');
            botonSubmit.prop('disabled', false);
            botonSubmit.attr('data-bs-toggle', 'tooltip');
            botonSubmit.attr('data-bs-custom-class', 'custom-tooltip-success');
            botonSubmit.attr('data-bs-title', 'Enviar datos');
            // Destruye el tooltip actual
            botonSubmit.tooltip('dispose');

            // Reactiva el tooltip con los nuevos atributos
            botonSubmit.tooltip();

            // Se agrega otro botón para cancelar la modificación de los datos
            const botonCancelar = $('<button>', {
                'class': 'btn btn-danger btn-cancelar',
                'data-bs-toggle': 'tooltip',
                'data-bs-placement': 'top',
                'data-bs-title': 'Cancelar',
                'data-bs-custom-class': 'custom-tooltip-danger',
                'data-id': idUsuario,
                'id': 'btn-cancelar'+idUsuario,
                html: $('<i>', {
                    'class': 'fa-solid fa-xmark'
                })
            });          
            tdBotones.append(botonCancelar);
            $(botonCancelar).tooltip();
            // Guarda los contenidos de los inputs para luego compararlos
            nombreUsuarioAntiguo = $(inputNombre).val();
            mailUsuarioAntiguo = $(inputMail).val();
            // Se detiene el envio del formulario
            event.preventDefault();
        } else { // Si los inputs ya estan activados, valida su contenido y manda el formulario
            var comienzoMensaje = "<i class='fas fa-exclamation-triangle pe-2'></i><b>Error</b>: ";
            var nombreUsuarioNuevo = $(inputNombre).val();
            var mailUsuarioNuevo = $(inputMail).val();
            var usernameIncorrecto = false;
            var emailIncorrecto = false;
            // Si no se han cambiado los datos de los inputs
            if (nombreUsuarioAntiguo == nombreUsuarioNuevo && mailUsuarioAntiguo == mailUsuarioNuevo) {
                alertPlaceholder.empty();
                alert(comienzoMensaje + 'No has modificado ningún dato.', 'danger');
                usernameIncorrecto = true;
                emailIncorrecto = true;
                botonSubmit.tooltip('dispose');
                botonSubmit.tooltip();
            } else {
                alertPlaceholder.empty();
                // Validación del nombre de usuario
                if (nombreUsuarioNuevo === "") {
                    usernameIncorrecto = true;
                    alert(comienzoMensaje+"El campo 'Nombre de usuario' no puede estar vacío.", "danger");
                } else if(nombreUsuarioNuevo.length > 50){
                    usernameIncorrecto = true;
                    alert(comienzoMensaje+"El campo 'Nombre de usuario' tiene un máximo de 50 carácteres.", "danger");
                } else { usernameIncorrecto = false; }
                
                // Validación del mail
                if (mailUsuarioNuevo === "") {
                    emailIncorrecto = true;
                    alert(comienzoMensaje+"El campo 'Email' no puede estar vacío.", "danger");
                } else if (!(validarEmail(mailUsuarioNuevo))) {
                    emailIncorrecto = true;
                    alert(comienzoMensaje+"El campo 'Email' no cumple con el formato de email.", "danger");
                } else if (mailUsuarioNuevo.length > 50) {
                    emailIncorrecto = true;
                    alert(comienzoMensaje+"El campo 'Email' tiene un máximo de 50 carácteres.", "danger");
                } else { emailIncorrecto = false; }
            }
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

    // Al hacer click en algun boton de cancelar
    $(document).on('click', '.btn-cancelar', function() {
        var idUsuario = $(this).data("id");

        var botonCancelar = $('#btn-cancelar'+idUsuario);
        botonCancelar.tooltip('dispose');
        botonCancelar.remove();

        var botonSubmit = $('#btn-modificar-' + idUsuario);
        var inputNombre = $('#inputnombre' + idUsuario);
        var inputMail = $('#inputmail' + idUsuario);

        // Se desactivan y modifican los inputs
        inputMail.prop('disabled', true);
        inputMail.val(mailUsuarioAntiguo);
        inputMail.removeClass('bg-success-subtle');
        inputMail.removeClass('border-secondary');
        inputMail.removeClass('border-danger');
        inputMail.addClass('border-0');
        inputMail.removeClass('is-invalid');

        inputNombre.removeClass('is-invalid');
        inputNombre.prop('disabled', true);
        inputNombre.val(nombreUsuarioAntiguo);
        inputNombre.removeClass('bg-success-subtle');
        inputNombre.removeClass('border-secondary');
        inputNombre.removeClass('border-danger');
        inputNombre.addClass('border-0');
        // Deshabilita todos los otros botones
        $('.btn-modificar').each(function() {
            $(this).prop('disabled', false);
        });
        // Modifica el botón para modificar los datos
        botonSubmit.html('Editar');
        botonSubmit.addClass('btn-primary');
        botonSubmit.removeClass('btn-success');
        botonSubmit.attr('data-bs-toggle', 'tooltip');
        botonSubmit.attr('data-bs-custom-class', 'custom-tooltip');
        botonSubmit.attr('data-bs-title', 'Cambiar datos');
        botonSubmit.tooltip('dispose');
        botonSubmit.tooltip();
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