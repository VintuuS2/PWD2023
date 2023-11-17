var alertPlaceholder = $('#liveAlertPlaceholder');
        const alert = (message, type) => {
            const wrapper = document.createElement('div');
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible text-white" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('');
            alertPlaceholder.append(wrapper);
        };
        $("#miFormulario").submit(function(event) {
            var formulario = this;

            if (!formulario.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            var inputNombre = $('#usnombre');
            var inputEmail = $("#usmail");
            var input_passConfirmacion = $('#uspass');
            var input_nueva_uspass = $("#nueva_uspass");
            var input_confirmar_nueva_uspass = $("#confirmar_nueva_uspass");

            var nombre = inputNombre.val();
            var email = inputEmail.val();
            var passConfirmacion = input_passConfirmacion.val();
            var nueva_uspass = input_nueva_uspass.val();
            var confirmar_nueva_uspass = input_confirmar_nueva_uspass.val();

            var passConfirmacionMd5 = md5(passConfirmacion);
            nombreValido = (nombre != "" && nombre.length <= 50);
            emailValido = validarEmail(email);
            nuevaPassValida = true;
            nuevaPassConfirmadaValida = true;
            // verifica que las nuevas contraseñas sean iguales si al menos una tiene contenido
            if (nueva_uspass !== "" || confirmar_nueva_uspass !== "") {
                if (nueva_uspass === confirmar_nueva_uspass) {
                    // verifica que la nueva contraseña sea diferente de la actual
                    if (md5(nueva_uspass) === passMd5) {
                        nuevaPassValida = false;
                        passValida = false;
                    } else {
                        nuevaPassValida = true;
                        nuevaPassConfirmadaValida = true;
                    }
                } else {
                    if (nueva_uspass == "") {
                        nuevaPassValida = false;
                    } else {
                        nuevaPassConfirmadaValida = false;
                    }
                }
            }
            if (passConfirmacion != "") {
                // Verificar la contraseña actual con el hash almacenado en PHP
                if (passMd5 == passConfirmacionMd5) {
                    passValida = true;
                } else {
                    passValida = false;
                }
            } else {
                passValida = false;
            }


            if (nombreValido) {
                inputNombre.addClass('border-success');
                inputNombre.removeClass('border-danger');
                inputNombre.siblings('.invalid-feedback').addClass('d-none');
                inputNombre.siblings('.invalid-feedback').removeClass('d-block');
            } else {
                inputNombre.addClass('border-danger');
                inputNombre.removeClass('border-success');
                inputNombre.siblings('.invalid-feedback').addClass('d-block');
                inputNombre.siblings('.invalid-feedback').removeClass('d-none');
            }

            if (emailValido) {
                inputEmail.addClass('border-success');
                inputEmail.removeClass('border-danger');
                inputEmail.siblings('.invalid-feedback').addClass('d-none');
                inputEmail.siblings('.invalid-feedback').removeClass('d-block');
            } else {
                inputEmail.addClass('border-danger');
                inputEmail.removeClass('border-success');
                inputEmail.siblings('.invalid-feedback').addClass('d-block');
                inputEmail.siblings('.invalid-feedback').removeClass('d-none');
            }
            if (passValida) {
                input_passConfirmacion.addClass('border-success');
                input_passConfirmacion.removeClass('border-danger');
                input_passConfirmacion.siblings('.invalid-feedback').addClass('d-none');
                input_passConfirmacion.siblings('.invalid-feedback').removeClass('d-block');
            } else {
                input_passConfirmacion.addClass('border-danger');
                input_passConfirmacion.removeClass('border-success');
                input_passConfirmacion.siblings('.invalid-feedback').addClass('d-block');
                input_passConfirmacion.siblings('.invalid-feedback').removeClass('d-none');
            }
            if (nuevaPassValida) {
                input_nueva_uspass.addClass('border-success');
                input_nueva_uspass.removeClass('border-danger');
                input_nueva_uspass.siblings('.invalid-feedback').addClass('d-none');
                input_nueva_uspass.siblings('.invalid-feedback').removeClass('d-block');
            } else {
                input_nueva_uspass.addClass('border-danger');
                input_nueva_uspass.removeClass('border-success');
                input_nueva_uspass.siblings('.invalid-feedback').addClass('d-block');
                input_nueva_uspass.siblings('.invalid-feedback').removeClass('d-none');
            }
            if (nuevaPassConfirmadaValida) {
                input_confirmar_nueva_uspass.addClass('border-success');
                input_confirmar_nueva_uspass.removeClass('border-danger');
                input_confirmar_nueva_uspass.siblings('.invalid-feedback').addClass('d-none');
                input_confirmar_nueva_uspass.siblings('.invalid-feedback').removeClass('d-block');
            } else {
                input_confirmar_nueva_uspass.addClass('border-danger');
                input_confirmar_nueva_uspass.removeClass('border-success');
                input_confirmar_nueva_uspass.siblings('.invalid-feedback').addClass('d-block');
                input_confirmar_nueva_uspass.siblings('.invalid-feedback').removeClass('d-none');
            }
            if (nombreValido && emailValido && passValida && nuevaPassValida && nuevaPassConfirmadaValida) {
                formData = $("#miFormulario").serialize();
                $.ajax({
                        type: 'POST',
                        url: '../Accion/modificarDatosUsuario.php',
                        data: formData
                    })
                    .done(function(response) {
                        alert('Se han modificado los datos correctamente', 'success');
                    })
                    .fail(function(error) {
                        alert('Error al modificar los datos', 'danger');
                    });
            }
            event.preventDefault();
        });

        function validarEmail(email) {
            var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (email.match(validRegex)) {
                return true;
            } else {
                return false;
            }
        }