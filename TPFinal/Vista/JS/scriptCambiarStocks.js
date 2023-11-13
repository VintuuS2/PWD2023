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
        var idProducto = $(this).data("id");
        var botonSubmit = $('#btn-modificar-' + idProducto);

        var inputStock = $('#procantstock' + idProducto);
        // Si el imput esta desactivado
        if (inputStock.prop('disabled')) {
            var tdBotones = $('#columnaBotones' + idProducto);
            // Se activa y modifica el input de stock
            inputStock.prop('disabled', false);
            inputStock.addClass('bg-white');
            inputStock.addClass('border-secondary');
            inputStock.removeClass('bg-light');
            inputStock.removeClass('border-0');
            // Deshabilita todos los otros botones
            $('.btn-modificar').each(function() {
                $(this).prop('disabled', true);
            });
            // Modifica el botón para enviar el dato
            botonSubmit.html('<i class="fa-regular fa-paper-plane"></i>');
            botonSubmit.addClass('btn-success');
            botonSubmit.removeClass('btn-primary');
            botonSubmit.prop('disabled', false);
            botonSubmit.attr('data-bs-toggle', 'tooltip');
            botonSubmit.attr('data-bs-custom-class', 'custom-tooltip-success');
            botonSubmit.attr('data-bs-title', 'Enviar dato');
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
                'data-id': idProducto,
                'id': 'btn-cancelar'+idProducto,
                html: $('<i>', {
                    'class': 'fa-solid fa-xmark'
                })
            });          
            tdBotones.append(botonCancelar);
            $(botonCancelar).tooltip();
            // Guarda el contenido del stock
            stockAntiguo = $(inputStock).val();
            // Se detiene el envio del formulario
            event.preventDefault();
        } else { // Si el input ya está activado valida su contenido y manda el formulario
            var comienzoMensaje = "<i class='fas fa-exclamation-triangle pe-2'></i><b>Error</b>: ";
            var stockNuevo = $(inputStock).val();
            var stockIncorrecto = false;
            alertPlaceholder.empty();
            // Si no se ha cambiado el stock
            if (stockAntiguo == stockNuevo) {
                alert(comienzoMensaje + 'No has modificado el stock.', 'danger');
                stockIncorrecto = true;
                botonSubmit.tooltip('dispose');
                botonSubmit.tooltip();
            } else {
                // Validación del stock
                if (stockNuevo === "") {
                    stockIncorrecto = true;
                    alert(comienzoMensaje+"El campo 'Stock' no puede estar vacío.", "danger");
                } else if(stockNuevo < 0){
                    stockIncorrecto = true;
                    alert(comienzoMensaje+"El campo 'Stock' tiene que ser mayor o igual a cero", "danger");
                } else { stockIncorrecto = false; }
            }
            if (stockIncorrecto) {
                event.preventDefault();
                inputStock.addClass('border-danger');
                inputStock.addClass('is-invalid');
            } else {
                inputStock.removeClass('border-danger');
                inputStock.removeClass('is-invalid');
                inputStock.addClass('border-success');
                inputStock.addClass('is-valid');
            }
        }
    });

    // Al hacer click en algun boton de cancelar
    $(document).on('click', '.btn-cancelar', function() {
        var idProducto = $(this).data("id");

        var botonCancelar = $('#btn-cancelar'+idProducto);
        botonCancelar.tooltip('dispose');
        botonCancelar.remove();

        var botonSubmit = $('#btn-modificar-' + idProducto);
        var inputStock = $('#procantstock' + idProducto);

        // Se desactiva y se modifica el input
        inputStock.removeClass('is-invalid');
        inputStock.prop('disabled', true);
        inputStock.val(stockAntiguo);
        inputStock.removeClass('bg-white');
        inputStock.removeClass('border-secondary');
        inputStock.removeClass('border-danger');
        inputStock.addClass('bg-light');
        inputStock.addClass('border-0');
        // Habilita todos los otros botones de modificación
        $('.btn-modificar').each(function() {
            $(this).prop('disabled', false);
        });
        // Modifica el botón para modificar los datos
        botonSubmit.html('Editar');
        botonSubmit.addClass('btn-primary');
        botonSubmit.removeClass('btn-success');
        botonSubmit.attr('data-bs-toggle', 'tooltip');
        botonSubmit.attr('data-bs-custom-class', 'custom-tooltip');
        botonSubmit.attr('data-bs-title', 'Cambiar el stock del producto');
        botonSubmit.tooltip('dispose');
        botonSubmit.tooltip();
    });
});