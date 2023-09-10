$(document).ready(function(){
    function validarDni(dni){
        dniValido = true;
        if (dni.lenght!==8){
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
        if (fecha.getFullYear()<1920){
            añoValido = false;
        }
        if (!añoValido){
            fechaValida = false
        }
        return fechaValida
    }
})