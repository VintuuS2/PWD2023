<?php
//ob_start();
//include_once '../../configuracion.php';

/**Variables Importantes:
 * $verComo: Las options de roles
 * 
 */

$session = new Session;
if ($session->validar()) {
    setcookie("login", 1);
} else {
    setcookie("login", 0);
}
//ob_end_flush();

$abmRol = new AbmRol;
$abmMenuRol = new AbmMenuRol;
$abmMenu = new AbmMenu;

$verComo = "";
if ($session->validar()){
    foreach ($_SESSION['idroles'] as $unId) {
        $roles['idrol'] = $unId;
        $listaObjRoles = $abmRol->buscar($roles);
        foreach ($listaObjRoles as $objRol) {
            $descRol[] = $objRol;
        }
    }
    
    foreach ($_SESSION['idroles'] as $rol) {
        $unIdRol['idrol'] = $rol;
        $weas = $abmMenuRol->buscar($unIdRol);
        foreach ($weas as $unaWea) {
            $menuPadre[] = $unaWea->getObjMenu();
        }
    }
    
    foreach ($menuPadre as $unMenu) {
        $elMenu['idpadre'] = $unMenu->getIdMenu();
        $menues = $abmMenu->buscar($elMenu);
        foreach ($menues as $unMenusito) {
            $menuNombre[] = $unMenusito->getMeDescripcion();
        }
    }
    
    if (count($descRol)>1){
        setcookie("verComo",1);
        foreach ($descRol as $nombreRol) {
            $verComo .= '<option value="' . $nombreRol->getIdRol() . '">' . $nombreRol->getRolDesc() . '</option>';
        }
    } else {
        setcookie("verComo",0);
        $verComo .= '<option value="' . $descRol[0]->getIdRol() . '">' . $descRol[0]->getRolDesc() . '</option>';
    }

} else {

}

/*echo "Estos son los roles del usuario:<br>";
print_r($descRol);
echo "<br>";
echo "<br>";

echo "Estos son los menús padres:<br>";
print_r($menuPadre);
echo "<br>";

echo "<br>Estos son los nombres de todos los menús disponibles por el usuario:<br>";
print_r($menuNombre);
echo "<br>";*/
