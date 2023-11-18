<?php
$titulo = "Login";
include_once "../../configuracionProyecto.php";
include_once "../configuracion.php";
//include_once "./Estructura/header.php";
if ($session->validar()){
    header('Location:'.$urlRoot."Vista/Cliente/index.php");
}
include_once "./Estructura/ultimoNav.php";
?>

<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-body-tertiary row col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100">
        <div class="bg-black p-5 rounded-5 text-white col-12 col-sm-8 col-md-8 col-lg-6 col-xl-4">
            <div class="text-center">
                <?php 
                if (isset($_SESSION['mensajeError'])){
                    echo "<p class='text-danger'>".$_SESSION['mensajeError']."</p>";
                    $_SESSION['mensajeError'] = null;
                } else if (isset($_SESSION['mensajeExito'])){
                    echo "<p class='text-success'>".$_SESSION['mensajeExito']."</p>";
                    $_SESSION['mensajeExito'] = null;
                }
                ?>
            </div>
            <form action="./Accion/verificarLogin.php" method="post" class="needs-validation" novalidate>
                <div class="text-center">
                    <h2>Login</h2>
                </div>
                <div class="form-group mb-2">
                    <label for="email-input" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email-input" id="email-input" placeholder="Ingrese su email" errorVacio="Por favor rellene este campo" errorPatron="El contenido solo acepta carácteres alfanuméricos" required>
                    <div class="invalid-feedback">
                        Rellene este campo
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-input" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" pattern="[a-zA-Z0-9]+" name="password-input" id="password-input" placeholder="Ingrese su contraseña" errorVacio="Por favor rellene este campo" errorPatron="El contenido solo acepta hasta 11 carácteres numéricos" required>
                    <div class="invalid-feedback">
                        Rellene este campo
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-75">Ingresar</button>
                    <!-- Link que trigerea el modal -->
                    <a type="button" class="text-primary text-decoration-none link-body-emphasis mt-3" data-bs-target="#registroModal" data-bs-toggle="modal">¿No tiene una cuenta? ¡Registrese ahora!</a>
                </div>
            </form>
            <!-- Modal -->
            <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="tituloModal">Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="./Accion/registroUsuario.php" id="registro" method="post" class="needs-validation" novalidate>
                                <div class="form-group mb-2">
                                    <label for="user-register" class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" name="user-register" id="user-register" placeholder="Username" errorVacio="Por favor rellene este campo" errorPatron="El contenido solo acepta carácteres alfanuméricos" required>
                                    <div class="invalid-feedback">
                                        Rellene este campo
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password-input" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" pattern="[a-zA-Z0-9]+" name="password-register" id="password-register" placeholder="Password" errorVacio="Por favor rellene este campo" errorPatron="El contenido solo acepta carácteres alfanuméricos" required>
                                    <div class="invalid-feedback">
                                        Rellene este campo
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password-input" class="form-label">Confirmar contraseña</label>
                                    <input type="password" class="form-control" pattern="[a-zA-Z0-9]+" name="password-registerConfirm" id="password-registerConfirm" placeholder="Password" errorVacio="Por favor rellene este campo" errorPatron="Las contraseñas no coínciden" required>
                                    <div class="invalid-feedback">
                                        Rellene este campo
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password-input" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email-register" id="email-register" placeholder="Email" errorVacio="Por favor rellene este campo" errorPatron="El contenido solo acepta carácteres alfanuméricos" required>
                                    <div class="invalid-feedback">
                                        Rellene este campo
                                    </div>
                                </div>
                                <br>
                                <div class="text-center mb-2">
                                    <button type="submit" class="btn btn-primary p-2">Registrarse</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Modal --->
        </div>
    </div>
</div>
<script src="./JS/scriptLogin.js"></script>
<script src="./JS/scriptRegistro.js"></script>
<?php include_once "../../vista/estructura/footer.php"; ?>