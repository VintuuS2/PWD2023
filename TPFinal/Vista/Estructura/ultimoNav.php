        <nav class="sticky-top bg-grupo1 rounded-bottom-4">
            <!-- Título --->
            <header class="container d-flex justify-content-center py-1">
                <div class="align-items-center text-decoration-none text-light">
                    <i class="fa-solid fa-user-group mx-2"></i>
                    <span class="fs-4">Grupo1 TP Final</span>
                </div>
            </header>
            <!-- /Título --->
            <navbar class="container d-flex justify-content-around py-1 navbar-expand-md">
                <!-- Navbar --->
                <div class="pb-3">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="navbar-collapse justify-content-center collapse" id="collapsibleNavbar">
                    <ul class="nav nav-pills justify-content-center gap-2">
                        <li class="nav-item"><a href="<?php echo $PROYECTOROOT ?>TPFinal/Vista/index.php" class="nav-link text-light link-body-emphasis">Inicio</a></li>
                        <li class="nav-item"><a href="<?php echo $PROYECTOROOT ?>" class="nav-link text-light link-body-emphasis">Algo1</a></li>
                        <li class="nav-item"><a href="<?php echo $PROYECTOROOT ?>" class="nav-link text-light link-body-emphasis">Algo2</a></li>
                        <li class="nav-item"><a href="<?php echo $PROYECTOROOT ?>" class="nav-link text-light link-body-emphasis">Algo3</a></li>
                        <li class="nav-item"><a href="<?php echo $PROYECTOROOT ?>" class="nav-link text-light link-body-emphasis">Algo4</a></li>
                    </ul>
                </div>
                <!-- /Navbar --->
                <!-- Botón logeo --->
                <div class="position-absolute end-0 me-5">
                    <!-- Si el color del borde blanco del botón de menú de logeo no gusta, borrar "btn-outline-light" owo --->
                    <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-target="menuUsuario">
                        <i class="fa-solid fa-user"></i>
                    </button>
                    <div class="dropdown-menu" id="menuUsuario">
                        <a href="<?php echo $PROYECTOROOT ?>TPFinal/Vista/login.php" class="dropdown-item is">Iniciar sesión</a>
                        <a href="<?php echo $PROYECTOROOT ?>TPFinal/Vista/configuracionUsuario.php" class="dropdown-item cf">Configuración</a>
                        <a href="<?php echo $PROYECTOROOT ?>TPFinal/Vista/Accion/destruirSession.php" class="dropdown-item cs">Cerrar sesión</a>
                    </div>
                </div>
                <!-- /Botón logeo --->
            </navbar>
        </nav>