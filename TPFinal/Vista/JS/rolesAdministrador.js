$(document).ready(function() {

    var alertPlaceholder = $('#liveAlertPlaceholder');
    const alert = (message, type) => {
        const wrapper = document.createElement('div');
        wrapper.innerHTML = [
            `<div class="alert alert-${type} bg-${type} text-light alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('')
        alertPlaceholder.append(wrapper)
    }
    //Captura el evento de click en el boton dentro del form de verRolesAdministrador
    $('#recibirdatosformboton').on('click', function(e){
        e.preventDefault();

        // Serializa el formulario
        
        var formRecibido = $('#formrolesusuario').serialize();

        // Lo envia a modificarRoles.php
        $.ajax({
            type: 'POST',
            url: '../Accion/modificarRoles.php',
            data: formRecibido,
            success: function(response) {
                alert('Enviado exitosamente', 'success');
            },
            error: function(error) {
                alert ('No se ha podido enviar', 'danger');
            }
        });
        setTimeout(function(){
            location.reload();
        },2000)
    });
});
