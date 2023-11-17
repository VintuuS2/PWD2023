<?php
$titulo = "Configuración";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/ultimoNav.php";
$usuario = $session->getUserObj();
?>
<div class="min-vh-100 d-flex justify-content-center">
    <div style="top: 100px; z-index:100;" class="row justify-content-center align-items-center position-fixed fixed-top mx-0 px-0">
        <div id="liveAlertPlaceholder" class="col-12 col-sm-10 col-md-7 col-xl-6 mt-5 text-center"></div>
    </div>
    <div class="col-12 col-lg-9 bg-body-tertiary h-100 min-vh-100">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <form data-bs-theme="light" id="miFormulario" class="needs-validation row bg-gris p-4 rounded col-12 col-xs-10 col-md-8 col-xl-6" action="./../Accion/modificarDatosUsuario.php" method="POST" novalidate>
                <h2 class="text-center text-primary">Modificación de datos</h2>
                <div class="input-group mb-4">
                    <div class="ms-2 me-auto">
                        <?php
                        $habilitado = $usuario->getHabilitado();
                        echo "<div class='fw-bold text-black'>Estado de Cuenta: " . (is_null($habilitado) ? "Usuario habilitado</div>" : "Usuario deshabilitado</div>");
                        ?>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon1">Usuario</span>
                    <input type="text" class="form-control" name="usnombre" id="usnombre" maxlength="50" required placeholder="Nombre de usuario" value=<?php echo "'" . $usuario->getNombre() . "'" ?> aria-describedby="basic-addon1">
                    <div class="invalid-feedback">
                        Debe ingresar un nombre de usuario
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon2">E-mail</span>
                    <input aria-describedby="basic-addon2" class='form-control' type='email' name='usmail' placeholder="ejemplo@email.com" required id='usmail' value=<?php echo "'" . $usuario->getMail() . "'" ?>>
                    <div class="invalid-feedback">
                        Debe ingresar un email válido
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon5">Contraseña actual</span>
                    <input class='form-control' type='password' required maxlength="32" autocomplete="on" name='uspass' id='uspass' value='' aria-describedby="basic-addon5">
                    <div class="invalid-feedback">
                        Debe ingresar su contraseña para confirmar cambios
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon3">Nueva Contraseña*</span>
                    <input class='form-control' type='password' maxlength="32" autocomplete="on" name='nueva_uspass' id='nueva_uspass' aria-describedby="basic-addon3" placeholder="(opcional)">
                    <div class="invalid-feedback">
                        Debe ingresar una contraseña diferente a la actual
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon4">Nueva contraseña(de nuevo)</span>
                    <input class='form-control' type='password' maxlength="32" autocomplete="on" name='confirmar_nueva_uspass' id='confirmar_nueva_uspass' aria-describedby="basic-addon3" placeholder="(opcional)">
                    <div class="invalid-feedback">
                        Las nuevas contraseñas no coinciden
                    </div>
                </div>

                <div class="d-flex align-content justify-content-center">
                    <button type="submit" class="btn btn-success btn-sm fs-5">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../JS/md5.min.js"></script>
<script>
    $(document).ready(function() {
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
            var passMd5 = "<?php echo $usuario->getPass(); ?>";
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
                    nuevaPassValida = true;
                    nuevaPassConfirmadaValida = true;
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
                formData = $(this).serialize;
                $.ajax({
                        type: 'POST',
                        url: './../Accion/modificarDatosUsuario.php',
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
    });
</script>
<?php

include_once "../../../vista/estructura/footer.php";
?>