<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $PROYECTOROOT ?>vista/css/style.css">
    <script src="<?php echo $PROYECTOROOT ?>vista/js/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo $PROYECTOROOT ?>vista/css/bootstrap.min.css">
    <script src="<?php echo $PROYECTOROOT ?>vista/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/3f0f040aa7.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
</head>

<body>
    <div class="container-fluid bg-dark p-0" data-bs-theme="dark">
        <nav class="navbar navbar-expand-sm justify-content-center shadow bg-grupo1">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="container-fluid justify-content-center collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">TP1</a>
                            <ul class="dropdown-menu" style="background: linear-gradient(135deg, rgba(85,68,173,0.75) 5%, rgba(72,57,161,0.75) 62%, rgba(110,90,199,0.75) 95%);">
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP1/Vista/ej1.php">Ejercicio 1</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP1/Vista/ej2.php">Ejercicio 2</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP1/Vista/ej3.php">Ejercicio 3</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP1/Vista/ej4.php">Ejercicio 4</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP1/Vista/ej5.php">Ejercicio 5</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP1/Vista/ej6.php">Ejercicio 6</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP1/Vista/ej7.php">Ejercicio 7</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP1/Vista/ej8.php">Ejercicio 8</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">TP2</a>
                            <ul class="dropdown-menu" style="background: linear-gradient(135deg, rgba(85,68,173,0.75) 5%, rgba(72,57,161,0.75) 62%, rgba(110,90,199,0.75) 95%);">
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP2/Vista/ej1.php">Ejercicio 1</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP2/Vista/ej2.php">Ejercicio 2</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP2/Vista/ej3.php">Ejercicio 3</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP2/Vista/ej4.php">Ejercicio 4</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">TP3</a>
                            <ul class="dropdown-menu" style="background: linear-gradient(135deg, rgba(85,68,173,0.75) 5%, rgba(72,57,161,0.75) 62%, rgba(110,90,199,0.75) 95%);">
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP3/Vista/ej1.php">Ejercicio 1</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP3/Vista/ej2.php">Ejercicio 2</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP3/Vista/EJ3.php">Ejercicio 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">TP4</a>
                            <ul class="dropdown-menu" style="background: linear-gradient(135deg, rgba(85,68,173,0.75) 5%, rgba(72,57,161,0.75) 62%, rgba(110,90,199,0.75) 95%);">
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP4/Vista/verAutos.php">Ver autos</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP4/Vista/listarPersonas.php">Ver personas</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP4/Vista/buscarAuto.php">Buscar un auto</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP4/Vista/autosPersona.php">Autos por persona</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP4/Vista/nuevaPersona.php">Añadir una persona</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP4/Vista/nuevoAuto.php">Añadir un auto</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP4/Vista/CambioDuenio.php">Cambiar de dueño</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP4/Vista/BuscarPersona.php">Modificar una persona</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">TPInvestigacion</a>
                            <ul class="dropdown-menu" style="background: linear-gradient(135deg, rgba(85,68,173,0.75) 5%, rgba(72,57,161,0.75) 62%, rgba(110,90,199,0.75) 95%);">
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TPInvestigacion/Vista">Inicio</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TPInvestigacion/Vista/Traductor.php">Traductor normal</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TPInvestigacion/Vista/traductorConPhpSelf.php">Traductor con PHP_SELF</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">TP5</a>
                            <ul class="dropdown-menu" style="background: linear-gradient(135deg, rgba(85,68,173,0.75) 5%, rgba(72,57,161,0.75) 62%, rgba(110,90,199,0.75) 95%);">
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP5/Vista/login.php">Login</a></li>
                                <li><a class="dropdown-item text-light" href="<?php echo $PROYECTOROOT ?>TP5/Vista/listarUsuario.php">Ver usuarios</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
