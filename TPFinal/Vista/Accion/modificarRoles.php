<?php
$titulo = "Roles Modificados";
include_once "../../../configuracionProyecto.php";
include_once "../Estructura/header.php"; 
include_once "../../configuracion.php";
$datos = data_submitted();
$error = false;

if (isset($datos['idusuario']) && isset($datos['usnombre']) && isset($datos['usroles'])) {
    $ids = $datos['idusuario'];
    $nombres = $datos['usnombre'];
    $roles = $datos['usroles'];
    $objUsuario = new AbmUsuario();
    $objUsuarioRol = new AbmUsuarioRol();
    $objRol = new AbmRol();


$abmUsuarioRol = new AbmUsuarioRol();

foreach ($ids as $id) {
    $usuarioBuscado = $objUsuario->buscar(['idusuario' => $id]);
    if (!empty($usuarioBuscado)) {
        $usuario = $usuarioBuscado[0];

        echo "ID: " . $usuario->getId() . "<br>";
        echo "Nombre de usuario: " . $usuario->getNombre() . "<br>";

        $listaRoles = $objRol->buscar(null);

        $roleNameToIdMap = [];

        foreach ($listaRoles as $rol) {
            $roleNameToIdMap[$rol->getRolDesc()] = $rol->getIdRol();
        }

    
        $idRoles = [];
        foreach ($roles[$id] as $roleName) {
            if (isset($roleNameToIdMap[$roleName])) {
                $idRoles[] = $roleNameToIdMap[$roleName];
            } else {
              
                echo "Rol  '$roleName' no encontrado.";
            }
        }
        foreach ($idRoles as $idRol) {
            $abmUsuarioRol->alta(['idusuario' => $usuario->getId(), 'idrol' => $idRol]);
            echo "<br>";
        }
    } else {
        echo "Usuario $id no encontrado.<br>";
    }
    echo "<br>";
}


}
?>