const numeroTelefonoValido = /^[0-9]{3}-[0-9]{7}$/;
const numeroDniValido = /^[0-9]{8}$/;
$(document).ready(function(){
    function validarDni(dni){
        dniValido = true;
        if (!numeroDniValido.test(dni)){
            dniValido = false;
        }
        return dniValido;
    }

    function validarNombre(nombre){
        nombreValido = true;
        if (nombre===""){
            nombreValido = false;
        }
        return nombreValido;
    }
    
    function validarApellido(apellido){
        apellidoValido = true;
        if (apellido===""){
            apellidoValido = false;
        }
        return apellidoValido;
    }

    function validarFechaNac(fechaNac){
        fechaValida = true;
        fecha = new Date(fechaNac)
        añoValido = true;
        if (fecha.getFullYear()<1920 || isNaN(fecha)){
            console.log(fecha.getFullYear())
            añoValido = false;
        }
        if (!añoValido){
            fechaValida = false
        }
        return fechaValida
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
        return direccionValida
    }

    $('#form').submit(function(event){
        event.preventDefault();

        var formValido = true;

        var dni = $('#NroDni').val();
        var apellido = $('#Apellido').val();
        var nombre = $('#Nombre').val();
        var fechaNac = $('#fechaNac').val();
        var telefono = $('#Telefono').val();
        var direccion = $('#Domicilio').val();

        if (validarDni(dni)){
            $('#NroDni').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#NroDni').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
        }

        if (validarApellido(apellido)){
            $('#Apellido').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#Apellido').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
        }

        if (validarNombre(nombre)){
            $('#Nombre').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#Nombre').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
        }

        if (validarFechaNac(fechaNac)){
            $('#fechaNac').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#fechaNac').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
        }

        if (validarTelefono(telefono)){
            $('#Telefono').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#Telefono').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
        }

        if (validarDomicilio(direccion)){
            $('#Domicilio').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#Domicilio').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
        }

        console.log(fechaValida);
        console.log(añoValido);

        if (formValido){
            $('#form')[0].submit();
        }
    })
})