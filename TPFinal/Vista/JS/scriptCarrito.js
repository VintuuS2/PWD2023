$(document).ready(function () {
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
    
});