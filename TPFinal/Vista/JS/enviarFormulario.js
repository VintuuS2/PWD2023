// enviarFormulario.js

// Espera a que el documento esté completamente cargado
$(document).ready(function () {

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

    var forms = $(".needs-validation");

    // Asigna la función enviarFormulario al evento clic del botón con ID 'btnenviar'
    forms.on("submit", function (event) {
        var formulario = this;
        var formData = $("#miFormulario").serialize();

        if (!formulario.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            $.ajax({
                type: 'POST',
                url: './../Accion/modificarDatosUsuario.php',
                data: formData
            })
                .done(function (response) {
                    alert('Formulario enviado exitosamente', 'success');
                })
                .fail(function (error) {
                    alert('Error al enviar el formulario', 'danger');
                });
        }
    });
});
