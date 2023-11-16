// deshabilitarUsuario.js

$(document).ready(function() {
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

    document.getElementById('btndeshabilitar').addEventListener('click', function() {
        var idusuario = $('#idusuario').val();
        $.ajax({
            type: 'POST',
            url: '../Accion/deshabilitarUsuario.php',
            data: {
                idusuario: idusuario
            }
        })
        .done(function(response) {
            alert('Usuario deshabilitado exitosamente', 'success');
            location.reload();
        })
        .fail(function(error) {
            alert('El usuario no pudo ser deshabilitado', 'danger');
        });
    });
});
