// enviarFormulario.js

// Espera a que el documento esté completamente cargado
$(document).ready(function() {
    
    // Función para mostrar alertas

    var alertPlaceholder = $('#liveAlertPlaceholder');
    const alert = (message, type) => {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('');
        alertPlaceholder.append(wrapper);
    };

    // Asigna la función enviarFormulario al evento clic del botón con ID 'btnenviar'
    $('#btnenviar').on('click', function() {
        var formData = $("#miFormulario").serialize();

        $.ajax({
            type: 'POST',
            url: './../Accion/modificarDatosUsuario.php',
            data: formData
        })
        .done(function(response) {
            alert('Formulario enviado exitosamente', 'success');
            setTimeout(function() {
            }, 30000);
        })
        .fail(function(error) {
            alert('Error al enviar el formulario', 'danger');
        });
    });
});
