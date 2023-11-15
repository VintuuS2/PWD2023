$(document).ready(function () {
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
    $('input[type="number"]').on('change', function () {
        // Obtiene el nuevo valor de la cantidad
        var nuevaCantidad = $(this).val();
  
        // Obtiene otros datos específicos de cada campo según tu estructura HTML
        var idCompraItem = $(this).data('product-id');
  
        // Realiza una petición Ajax para actualizar la base de datos
        window.location.href = "../Accion/cambiarCantidadItems.php?idcompraitem=" + idCompraItem + "&cicantidad=" + nuevaCantidad;
    });
    $(".botonSumar").on("click", function() {
        var idCompraItem = $(this).data('product-id');
        // Obtener los valores de los inputs
        var cantidadInput = $("#inputCantidad" + idCompraItem);
        // Modificar el valor del input usando stepUp
        cantidadInput.get(0).stepUp();
        var nuevaCantidad = cantidadInput.val();

        // Redireccionar a otra página con los valores como parámetros
        window.location.href = "../Accion/cambiarCantidadItems.php?idcompraitem=" + idCompraItem + "&cicantidad=" + nuevaCantidad;
    });
    $(".botonRestar").on("click", function() {
        var idCompraItem = $(this).data('product-id');
        // Obtener los valores de los inputs
        var cantidadInput = $("#inputCantidad" + idCompraItem);
        // Modificar el valor del input usando stepUp
        cantidadInput.get(0).stepDown();
        var nuevaCantidad = cantidadInput.val();

        // Redireccionar a otra página con los valores como parámetros
        window.location.href = "../Accion/cambiarCantidadItems.php?idcompraitem=" + idCompraItem + "&cicantidad=" + nuevaCantidad;
    });
    $('#formFinalizar').on('submit', function(event) {
        // Cuando se intenta comprar, se verifica que haya stock necesario
        var inputs = $('.cicantidad');
        // Iterar sobre cada elemento
        inputs.each(function() {
            // Obtener el valor del atributo 'maximo'
            var max = parseInt($(this).attr('maximo'), 10);
        
            // Obtener el valor del input
            var valor = $(this).val();
            if (max < valor) {
                var nombreItem = $(this).data('product-name');
                alert("<i class='fas fa-exclamation-triangle pe-2'></i> No hay stock suficiente del producto '"+nombreItem+"', el stock actual es de: "+max, "danger");
                $(this).addClass('bg-danger');
                $(this).removeClass('bg-success');
                event.preventDefault();
            } else {
                $(this).addClass('bg-success')
                $(this).removeClass('bg-danger');;
            }
        });
    });
});