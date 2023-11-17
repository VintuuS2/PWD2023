<?php

$datos = data_submitted();

$session = new Session;

$abmRol = new AbmRol;
$abmMenuRol = new AbmMenuRol;
$abmMenu = new AbmMenu;

$verComo = "";
$lista = "";
$estoVanUltimo = "";
$urlDelLocation = "";

//Setea el idRol a la opción que tenía seleccionada
$paginaVisible = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

//Descompongo la URL visible en el navegador
$archivo = basename($paginaVisible);
$carpeta = dirname($paginaVisible, 1);
$carpeta = basename($carpeta);

//Obtengo los últimos 2 indices
$url = trim($carpeta) . "/" . trim($archivo);

if ($session->validar()) {
    //Obtengo los datos del ajax
    if (isset($datos['selectVerComo'])) {
        $_SESSION['ultimoRol'] = $datos['selectVerComo'];
        $verComoOpcion = $datos['selectVerComo'];
    } else if (isset($_SESSION['rolelegido'])) {
        $verComoOpcion = $_SESSION['rolelegido'];
    } else {
        $verComoOpcion = $_SESSION['idroles'][0];
    }

    //Obtengo los roles del user
    $descRol = $session->getRoles();

    //Obtengo un array de todos los Menú padres
    foreach ($_SESSION['idroles'] as $rol) {
        $unIdRol['idrol'] = $rol;
        $weas = $abmMenuRol->buscar($unIdRol);
        foreach ($weas as $unaWea) {
            $menuPadre[] = $unaWea->getObjMenu();
        }
    }

    //Obtengo un array de todos los Menús
    foreach ($menuPadre as $unMenu) {
        $elMenu['idpadre'] = $unMenu->getIdMenu();
        $menues = $abmMenu->buscar($elMenu);
        foreach ($menues as $unMenusito) {
            $menuNombre[] = $unMenusito->getMeDescripcion();
        }
    }

    //Si hay más de un ROL: Habilito el SELECT
    if (count($descRol) > 1) {
        foreach ($descRol as $nombreRol) {
            $idRol = $nombreRol->getIdRol();
            $verComo .= '<option value="' . $idRol . '"' . ($verComoOpcion == $idRol ? " selected" : '') . '>' . $nombreRol->getRolDesc() . '</option>';
        }
        //Si no, solo muestro el único ROL que tengo
    } else {
        $session->updateRol();
        $verComoOpcion = $_SESSION['idroles'][0];
        $verComo .= '<option value="' . $_SESSION['idroles'][0] . '">' . $descRol[0]->getRolDesc() . '</option>';
    }

    //Convierto el idRol en un ARRAY para poder buscar
    $opcionElegida['idrol'] = $verComoOpcion;
    $listaMenu = $abmMenuRol->buscar($opcionElegida);

    //Convierto la lista obtenida en IDs y las pongo en otro ARRAY para lograr otra búsqueda
    $idPadre['idpadre'] = $listaMenu[0]->getObjMenu()->getIdMenu();
    $liMenus = $abmMenu->buscar($idPadre);

    //Declaro una variable para saber si puedo estar en la página actual
    $puedoEstar = false;
    $idAux = 0;
    foreach ($liMenus as $opcionMenu) {

        //Comparo la URL donde estoy con la de los Menús
        $descMenu = $opcionMenu->getMeDescripcion();
        if (trim($url) == trim($descMenu)) {
            $puedoEstar = true;
        }

        //Genero el índice del navbar
        $nombreMenu = $opcionMenu->getMeNombre();
        if ($nombreMenu == "Inicio" || $nombreMenu == "Configuracion") {
            $lista .= '<li class="nav-item m' . $idAux . '"><a href="' . $PROYECTOROOT . "TPFinal/Vista/" . $descMenu . '" class="nav-link text-light link-body-emphasis">' . $nombreMenu . '</a></li>';
        } else {
            $estoVanUltimo .= '<li class="nav-item m' . $idAux . '"><a href="' . $PROYECTOROOT . "TPFinal/Vista/" . $descMenu . '" class="nav-link text-light link-body-emphasis">' . $nombreMenu . '</a></li>';
        }
        $idAux++;
    }
    $lista .= $estoVanUltimo;

    $contador = 0;
    if (!$puedoEstar) {
        //Obtengo todos los roles y los comparo con la ID actual
        foreach ($descRol as $roles) {
            if ($roles->getIdRol() == $verComoOpcion) {
                $meQuedoAca = $contador;
                $_SESSION['rolelegido'] = $descRol[$meQuedoAca]->getIdRol();
            }
            $contador++;
        }
        $urlDelLocation = 'Location:' . $urlRoot . "Vista/" . $descRol[$meQuedoAca]->getRolDesc() . "/index.php";
    }
    header($urlDelLocation);
} else {
    if (!isset($_COOKIE['PHPSESSID'])){
        header('Location:' . $urlRoot . "Vista/");
    }
}