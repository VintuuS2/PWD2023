        <nav class="sticky-top bg-grupo1 rounded-bottom-4">
            <!-- Título --->
            <header class="container d-flex justify-content-center py-1">
                <div class="align-items-center text-decoration-none text-light">
                    <i class="fa-solid fa-user-group mx-2"></i>
                    <span class="fs-4">Grupo1 TP Final</span>
                </div>
            </header>
            <!-- /Título --->
            <!-- Menu --->
            <navbar class="container d-flex justify-content-around py-1 navbar-expand-md">
                <!-- <Ver como rol> --->
                <div class="position-absolute start-0 top-50 translate-middle-y ms-5 verComo">
                    <div class="d-inline-flex container justify-content-center">
                        Ver como:
                    </div>
                    <div class="container-fluid">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" id="form-nav">
                            <select name="selectVerComo" id="selectVerComo" class="form-select">
                            <?php echo $verComo;?>
                            </select>
                        </form>
                    </div>
                </div>
                <!-- </Ver como rol> --->
                <!-- Navbar --->
                <div class="pb-3">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="navbar-collapse justify-content-center collapse" id="collapsibleNavbar">
                    <ul class="nav nav-pills justify-content-center gap-2">
                        <?php echo $lista ?>
                    </ul>
                </div>
                <!-- /Navbar --->
                <!-- Botón logeo --->
                <div class="position-absolute top-50 end-0 translate-middle-y me-5">
                    <!-- Si el color del borde blanco del botón de menú de logeo no gusta, borrar "btn-outline-light" owo --->
                    <div class="d-inline-flex container justify-content-center">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-target="menuUsuario">
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <div class="dropdown-menu" id="menuUsuario">
                            <a href="<?php echo $PROYECTOROOT ?>TPFinal/Vista/login.php" class="dropdown-item is">Iniciar sesión</a>
                            <a href="<?php echo $PROYECTOROOT ?>TPFinal/Vista/Cliente/configuracionUsuario.php" class="dropdown-item cf">Configuración</a>
                            <a href="<?php echo $PROYECTOROOT ?>TPFinal/Vista/Accion/destruirSession.php" class="dropdown-item cs">Cerrar sesión</a>
                        </div>
                    </div>
                </div>
            </navbar>
            <!-- /Menu --->
        </nav>