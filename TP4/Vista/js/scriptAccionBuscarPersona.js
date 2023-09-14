const numeroTelefonoValido = /^[0-9]{3}-[0-9]{7}$/;
const formatoNombreValido = /^[a-zA-ZñÑ]+$/
$(document).ready(function(){

    function validarNombre(nombre){
        nombreValido = true;
        if (!formatoNombreValido.test(nombre)){
            nombreValido = false;
        }
        return nombreValido;
    }
    
    function validarApellido(apellido){
        apellidoValido = true;
        if (!formatoNombreValido.test(apellido)){
            apellidoValido = false;
        }
        return apellidoValido;
    }

    function validarTelefono(telefono){
        telefonoValido = true;
        if (!numeroTelefonoValido.test(telefono)){
            telefonoValido = false;
        }
        return telefonoValido;
    }

    function validarDomicilio(direccion){
        direccionValida = true;
        if (direccion===""){
            direccionValida = false;
        }
        return direccionValida;
    }

    $('#form').submit(function(event){
        event.preventDefault();

        var formValido = true;
        var mensaje = "";

        var apellido = $('#Apellido').val();
        var nombre = $('#Nombre').val();
        var telefono = $('#Telefono').val();
        var direccion = $('#Domicilio').val();

        if (validarNombre(nombre)){
            $('#Nombre').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#Nombre').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
            if (apellido===""){
                mensaje += "<li class=text-danger>El campo Nombre no puede estar vacío</li>";
            }
            if (!formatoNombreValido.test(apellido)){
                mensaje += "<li class=text-danger>El campo Nombre solo acepta carácteres alfabéticos</li>";
            }
        }

        if (validarApellido(apellido)){
            $('#Apellido').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#Apellido').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
            if (apellido===""){
                mensaje += "<li class=text-danger>El campo Apellido no puede estar vacío</li>";
            }
            if (!formatoNombreValido.test(apellido)){
                mensaje += "<li class=text-danger>El campo Apellido solo acepta carácteres alfabéticos</li>";
            }
        }

        if (validarTelefono(telefono)){
            $('#Telefono').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#Telefono').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
            if (!numeroTelefonoValido.test(telefono)){
                mensaje += "<li class=text-danger>El campo Teléfono tiene que tener el formato 123-1234567</li>";
            }
            if (telefono===""){
                mensaje += "<li class=text-danger>El campo Teléfono no puede estar vacío</li>";
            }
        }

        if (validarDomicilio(direccion)){
            $('#Domicilio').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#Domicilio').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
            if (direccion===""){
                mensaje += "<li class=text-danger>El campo Dirección no puede estar vacío</li>";
            }
        }

        if (formValido){
            $('#form')[0].submit();
        } else {
            $('#error').html(mensaje);
        }
    })
})