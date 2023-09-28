/*const numeroTelefonoValido = /^[0-9]{3}-[0-9]{7}$/;
const numeroDniValido = /^[0-9]{8}$/;
const formatoNombreValido = /^[a-zA-ZñÑ]+$/
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

    function validarFechaNac(fechaNac){
        fechaValida = true;
        fecha = new Date(fechaNac)
        añoValido = true;
        if (fecha.getFullYear()<1920 || isNaN(fecha)){
            añoValido = false;
        }
        if (!añoValido){
            fechaValida = false;
        }
        return fechaValida;
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
            if (!numeroDniValido.test(dni)){
                mensaje += "<li class=text-danger>El campo DNI solo acepta 8 carácteres numéricos</li>";
            }
            if (dni===""){
                mensaje += "<li class=text-danger>El campo DNI no puede estar vacío</li>";
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

        if (validarFechaNac(fechaNac)){
            $('#fechaNac').removeClass("is-invalid").addClass("is-valid");
        } else {
            $('#fechaNac').addClass("is-invalid").removeClass("is-valid");
            formValido = false;
            if (fechaNac===""){
                mensaje += "<li class=text-danger>El campo Fecha de nacimiento no puede estar vacío</li>";
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
})*/

$(document).ready(function () {
    var forms = $(".needs-validation");
    forms.on("submit", function (event) {
      var formulario = this;
  
      if (!formulario.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
  
      $(formulario).addClass("was-validated");
    });
  
    $(".needs-validation input[pattern]").on("input", function () {
      var campo = $(this);
      console.log(campo);
      var mensajeError = "";
  
      if (campo.prop("required") && campo.val() === "") {
        mensajeError = campo.attr("errorVacio");
      } else if (campo.prop("pattern") && !campo[0].checkValidity()) {
        mensajeError = campo.attr("errorPatron");
      }
  
      if (mensajeError != "") {
        campo.siblings(".invalid-feedback").html(mensajeError);
      } else {
        campo.siblings(".invalid-feedback").hmtl("");
      }
    });
  });