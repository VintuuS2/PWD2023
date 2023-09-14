const formatoPatenteValido = /^[A-Z]{3}\s\d{3}$/;
const formatoDniValido = /^[0-9]{8}$/;
const formatoModeloValido = /^[0-9]{2,4}$/
$(document).ready(function(){
    function validarPatente(patente){
        var patenteValida = true;
        if (!formatoPatenteValido.test(patente)){
            patenteValida = false;
        }
        return patenteValida;
    }

    function validarMarca(marca){
        var marcaValida = true;
        if (marca===""){
            marcaValida = false;
        }
        return marcaValida
    }

    function validarModelo(modelo){
        var modeloValido = false;
        var longitud = modelo.length;
        if (formatoModeloValido.test(modelo) && (longitud===2 || longitud===4)){
            modeloValido = true;
        }
        return modeloValido;
    }

    function validarDni(dni){
        dniValido = true;
        if (!formatoDniValido.test(dni)){
            dniValido = false;
        }
        return dniValido;
    }

    $('#form').submit(function(event){
        event.preventDefault();
        var formValido = true;
        var mensaje = "";

        var patente = $('#Patente').val();
        var marca = $('#Marca').val();
        var modelo = $('#Modelo').val();
        var dni = $('#DniDuenio').val();
        
        if (validarPatente(patente.toUpperCase())){
            $('#Patente').addClass("is-valid").removeClass("is-invalid");
        } else {
            $('#Patente').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
            mensaje += "<li class=text-danger>El formato debe ser 3 letras, un espacio y 3 números</li>"
            console.log(patente.length)
            if (patente.length<7){
                mensaje += "<li class=text-danger>La patente tiene que tener 7 dígitos</li>"
            }
        }

        if (validarMarca(marca)){
            $('#Marca').addClass("is-valid").removeClass("is-invalid");
        } else {
            $('#Marca').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
            mensaje += "<li class=text-danger>El campo marca no puede estar vacío</li>";
        }

        if (validarModelo(modelo)){
            $('#Modelo').addClass("is-valid").removeClass("is-invalid");
        } else {
            $('#Modelo').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
            if (modelo === ""){
                mensaje += "<li class=text-danger>El campo modelo no puede estar vacío</li>";
            }
            if (modelo.length>4 || modelo.length===3 || modelo.length<2){
                mensaje += "<li class=text-danger>El modelo solo admite años de 2 o 4 dígitos</li>";
            }
        }

        if (validarDni(dni)){
            $('#DniDuenio').addClass("is-valid").removeClass("is-invalid");
        } else {
            $('#DniDuenio').addClass("is-invalid").removeClass("is-valid");
            formValido = false; 
            if (dni===""){
                mensaje += "<li class=text-danger>El campo DNI no puede estar vacío</li>";
            }
            if (!formatoDniValido.test(dni)){
                mensaje += "<li class=text-danger>El campo DNI solo admite carácteres numéricos</li>"
            }
        }

        if (formValido){
            $('#form')[0].submit();
            $('#error').html("");
        } else {
            $('#error').html(mensaje);
        }
    })
})