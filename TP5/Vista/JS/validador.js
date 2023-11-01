$(document).ready(function () {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    var forms = $(".needs-validation");
    var alertPlaceholder = $('#liveAlertPlaceholder');
    const alert = (message, type) => {
        alertPlaceholder.empty();

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
        var inputNombre = $('#inputnombre' + idUsuario);
        var inputMail = $('#inputmail' + idUsuario);

        console.log(botonSubmit);
        // Si los inputs estan desactivados
        if (inputMail.prop('disabled') || inputNombre.prop('disabled')) {
            var tdBotones = $('#columnaBotones' + idUsuario);
            // Se activan y modifican los inputs
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
            // ACA FALTA HACER VALIDACIÓN DE NOMBRE DE USUARIO Y EMAIL CON BOOTSTRAP
            nombreUsuarioNuevo = $(inputNombre).val();
            mailUsuarioNuevo = $(inputMail).val();
            if (nombreUsuarioAntiguo == nombreUsuarioNuevo && mailUsuarioAntiguo == mailUsuarioNuevo) {
                alert('<i class="fas fa-exclamation-triangle pe-2"></i><b>Error</b>: No has modificado ningún dato.', 'danger');
                event.preventDefault();
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
        inputMail.addClass('bg-white');
        inputMail.addClass('border-0');
        inputNombre.prop('disabled', true);
        inputNombre.val(nombreUsuarioAntiguo);
        inputNombre.removeClass('bg-success-subtle');
        inputNombre.removeClass('border-secondary');
        inputNombre.addClass('bg-white');
        inputNombre.addClass('border-0');
        // Deshabilita todos los otros botones
        $('.btn-modificar').each(function() {
            $(this).prop('disabled', false);
        });
        // Modifica el botón para modificar los datos
        botonSubmit.html('Modificar');
        botonSubmit.addClass('btn-primary');
        botonSubmit.removeClass('btn-success');
        botonSubmit.attr('data-bs-toggle', 'tooltip');
        botonSubmit.attr('data-bs-custom-class', 'custom-tooltip');
        botonSubmit.attr('data-bs-title', 'Modificar datos');
        botonSubmit.tooltip('dispose');
        botonSubmit.tooltip();
    });
});