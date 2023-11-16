<?php
//include_once '../../configuracion.php';

/**Variables Importantes:
 * $verComo: Las options de roles
 * 
 */
$datos = data_submitted();
//var_dump($datos);

$session = new Session;
//var_dump($_SESSION);

$abmRol = new AbmRol;
$abmMenuRol = new AbmMenuRol;
$abmMenu = new AbmMenu;

$verComo = "";
$lista = "";
$estoVanUltimo = "";
$urlDelLocation = "";

//Setea el idRol a la opción que tenía seleccionada
$idRolAnterior = $_COOKIE['opcion'];
$paginaVisible = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$archivo = basename($paginaVisible);
$carpeta = dirname($paginaVisible,1);
$carpeta = basename($carpeta);

$url = trim($carpeta)."/".trim($archivo);
//$session->cerrar();
if ($session->validar()){
    setcookie("login", 1);

    //Obtengo los datos del ajax
    if (isset($datos['selectVerComo'])){
        //echo "Pasó por el true<br>";
        $_SESSION['ultimoRol'] = $datos['selectVerComo'];
        $verComoOpcion = $datos['selectVerComo'];
    } else if (isset($_SESSION['rolelegido'])){
        //echo "Pasó por el 2do true";
        $verComoOpcion = $_SESSION['rolelegido'];
    } else {
        //echo "Pasó por el false<br>";
        $verComoOpcion = $_SESSION['idroles'][0];
    }
    //echo "<br>Esta es la opcion: ";
    //var_dump($verComoOpcion);
    //echo "<br>";


    //Comprueba si aún tiene el rol desde la Sesion actual.
    $aunTieneRol = false;
    foreach ($_SESSION['idroles'] as $idRoles){
        if ($idRoles == $idRolAnterior){
            $aunTieneRol = true;
        }
    }

    //Si aun tiene el rol, la opción se queda a la última opción que seleccionó, si no, obtiene la opción del 1er rol que tenga.
    if ($aunTieneRol){
        $opcion = $verComoOpcion;
    } else {
        $opcion = $_SESSION['idroles'][0];
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
    
    //Si hay más de un ROL habilito el SELECT
    if (count($descRol)>1){
        setcookie("verComo",1);
        foreach ($descRol as $nombreRol) {
            $idRol = $nombreRol->getIdRol();
            $verComo .= '<option value="' . $idRol . '"' . ($verComoOpcion == $idRol ? " selected" : '') . '>' . $nombreRol->getRolDesc() . '</option>';
        }
    //Si no, solo muestro el único ROL que tengo
    } else {
        setcookie("verComo",0);
        //setcookie("opcion",$descRol[0]->getIdRol());
        $verComo .= '<option value="' . $descRol[0]->getIdRol() . '">' . $descRol[0]->getRolDesc() . '</option>';
    }

    //Convierto el idRol en un ARRAY para poder buscar
    $opcionElegida['idrol'] = $verComoOpcion;
    //echo $opcionElegida['idrol'];
    $listaMenu = $abmMenuRol->buscar($opcionElegida);
    
    //Convierto la lista obtenida en IDs y las pongo en otro ARRAY para lograr otra búsqueda
    $idPadre['idpadre'] = $listaMenu[0]->getObjMenu()->getIdMenu();
    $liMenus = $abmMenu->buscar($idPadre);

    //Declaro una variable para saber si puedo estar en la página actual
    $puedoEstar = false;
    foreach ($liMenus as $opcionMenu){

        //Comparo la URL donde estoy con la de los Menús
        $descMenu = $opcionMenu->getMeDescripcion();
        if (trim($url) == trim($descMenu)){
            $puedoEstar = true;
        }
        //Genero el índice del navbarecho
        $nombreMenu = $opcionMenu->getMeNombre();
        if ($nombreMenu == "Inicio"){
            $lista .= '<li class="nav-item"><a href="'. $PROYECTOROOT."TPFinal/Vista/".$descMenu .'" class="nav-link text-light link-body-emphasis">'.$nombreMenu.'</a></li>';
        } else {
            $estoVanUltimo .= '<li class="nav-item"><a href="'. $PROYECTOROOT."TPFinal/Vista/".$descMenu .'" class="nav-link text-light link-body-emphasis">'.$nombreMenu.'</a></li>';
        }
    }
    $lista .= $estoVanUltimo;

    $contador = 0;
    if (!$puedoEstar){
        //Obtengo todos los roles y los comparo con la ID actual
        foreach ($descRol as $roles){
            //echo $roles->getIdRol();
            if ($roles->getIdRol() == $verComoOpcion){
                $meQuedoAca = $contador;
                $_SESSION['rolelegido'] = $descRol[$meQuedoAca]->getIdRol();
            }
            $contador++;
        }
        $urlDelLocation = 'Location:'.$urlRoot."Vista/".$descRol[$meQuedoAca]->getRolDesc()."/index.php";
    }
    header($urlDelLocation);

} else {
    setcookie("login", 0);
}

/*//echo "Menu: ";
//print_r($opcion);
//echo $descMenu."\n";
//echo $nombreMenu."\n";
//echo "<br><br>";*/

/*//echo "<br>Estos son los roles del usuario:<br>";
print_r($descRol);
//echo "<br>";
//echo "<br>";

//echo "Rol seleccionado actualmente: ";
//echo $opcion."<br><br>";

//echo "Estos son los menús padres:<br>";
print_r($menuPadre);
//echo "<br>";

//echo "<br>Estos son los nombres de todos los menús disponibles por el usuario:<br>";
print_r($menuNombre);
//echo "<br>";

//echo "<br>Estos son los Menús visibles por la opción:<br>";
print_r($liMenus);
//echo "<br>";*/

?>