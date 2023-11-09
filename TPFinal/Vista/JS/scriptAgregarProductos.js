$(document).ready(function () {
    var forms = $(".needs-validation");
    forms.on("submit", function (event) {
        var formulario = this;
        if (!formulario.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        var imagenInput = $('#proimagen');
        var archivoSubido = imagenInput[0].files;

        // Verificar si se seleccionó al menos un archivo
        if (archivoSubido.length > 0) {
            var file = archivoSubido[0];
            var fileType = file.type; // Obtener el tipo de archivo

            // Verificar si el archivo es una imagen PNG o JPG
            if (fileType !== 'image/png' && fileType !== 'image/jpeg') {
                imagenInput.addClass('is-invalid');
                imagenInput.removeClass('is-valid');
                imagenInput.val(''); // Borrar la selección de archivo no válido
            } else {
                imagenInput.addClass('is-valid');
                imagenInput.removeClass('is-invalid');
            }
        }
        $(formulario).addClass("was-validated");
    });

    $('#proimagen').on('change', function() {
        if ($('#form').hasClass('was-validated')) {
            var fileInput = $('#proimagen');
            var file = fileInput[0].files;
            // Verificar si se seleccionó al menos un archivo
            if (file.length > 0) {
                var fileType = file[0].type; // Obtener el tipo de archivo del primer archivo
    
                // Verificar si el archivo es una imagen PNG o JPG
                if (fileType !== 'image/png' && fileType !== 'image/jpeg') {
                    fileInput.removeClass('is-valid');
                    fileInput.addClass('is-invalid');
                    fileInput.val(''); // Borrar la selección de archivo no válido
                } else {
                    fileInput.addClass('is-valid');
                    fileInput.removeClass('is-invalid');
                }
            }
        }
    });
    
});
