<?php
$tituloPagina = "TP2-Login";
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
?>
    <div class="contenedor vh-100">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <div class="d-flex align-items-center py-4 bg-body-tertiary">
                <main class="form-signin w-100 m-auto">
                    <div class="container-centered">
                        <form action="../../Vista/Ej3/Accion/a_alta_usuario.php" method="post" id="form">
                            <div class="container d-flex justify-content-center">
                                <div class="bg-secondary m-4  d-flex justify-content-center align-items-center" style="height: 300px; width: 300px;">
                                    <div class="bg-light position-relative " style="height: 270px; width: 270px;">
                                        <div class="d-grid gap-2 col-10 mx-auto position-absolute top-50 start-50 translate-middle">
                                            <p class="h5 text-center">Member Login</p>

                                            <div class="form-floating mb-2">
                                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Username">

                                                <label for="usuario" id="mensaje1"><i class="bi bi-person-fill"></i> <i class="fa-solid fa-user"></i>Username</label>

                                            </div>
                                            <div class="form-floating">
                                                <input type="password" class="form-control" id="contra" name="contra" placeholder="Password">
                                                <label for="pass"><i class="bi bi-lock-fill"></i><i class="fa-solid fa-lock"></i> Password</label>

                                            </div>
                                            <div id="formconsole" class="error"></div>
                                            <input type="submit" value="Login" id="boton" class="btn btn-primary " style="background-color: rgb(0,206,129);border-color: rgb(0,206,129)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script src="./js/ej3.js"></script>
<?php include_once './estructura/footer.php'; ?>