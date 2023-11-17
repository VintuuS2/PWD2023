<?php
$titulo = "Roles Modificados";

include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";

$datos = data_submitted();
$error = false;
$mensaje = "";
if (!isset($datos['usroles'])) {
    $datos['usroles'] = -1;
}
if (isset($datos['idusuario']) && isset($datos['usnombre']) && isset($datos['usroles'])) {
    $ids = $datos['idusuario'];
    $nombres = $datos['usnombre'];
    $roles = $datos['usroles'];
    $controlUsuario = new AbmUsuario();
    $controlUsuarioRol = new AbmUsuarioRol();
    $controlRol = new AbmRol();

    foreach ($ids as $id) {
        $usuarioBuscado = $controlUsuario->buscar(['idusuario' => $id]);
        if (!empty($usuarioBuscado)) {

            $usuario = $usuarioBuscado[0];
            $listaRoles = $controlRol->buscar(null);
            $roleNameToIdMap = [];

            foreach ($listaRoles as $rol) {
                $roleNameToIdMap[$rol->getRolDesc()] = $rol->getIdRol();
            }

            $idRoles = [];

            //Mapeo de los nombres de las IDs
            if (isset($roles[$id]) && is_array($roles[$id])) {
                foreach ($roles[$id] as $roleName) {
                    if (isset($roleNameToIdMap[$roleName])) {
                        $idRoles[] = $roleNameToIdMap[$roleName];
                    }
                }
            }

            foreach ($idRoles as $idRol) {
                // Verificar si la relación usuario-rol ya existe
                $relacionExistente = $controlUsuarioRol->buscar(['idusuario' => $usuario->getId(), 'idrol' => $idRol]);

                if (empty($relacionExistente)) {
                    // La relación no existe, entonces podes insertarla
                    $controlUsuarioRol->alta(['idusuario' => $usuario->getId(), 'idrol' => $idRol]);
                }
            }

            $rolesActuales = $controlUsuarioRol->buscar(['idusuario' => $usuario->getId()]);

            $rolesEliminar = [];
            foreach ($rolesActuales as $rolActual) {
                $idRolActual = $rolActual->getObjRol()->getIdRol();
                if (!in_array($idRolActual, $idRoles)) {
                    $rolesEliminar[] = $idRolActual;
                }
            }

            $soyYo = false;
            $estoyEnEseRol = false;
            if (count($rolesEliminar)==count($rolesActuales)){
                foreach ($rolesEliminar as $idRolEliminar) {
                    $controlUsuarioRol->baja(['idusuario' => $usuario->getId(), 'idrol' => $idRolEliminar]);
                }
                $controlUsuarioRol->alta(['idusuario' => $usuario->getId(), 'idrol' => '3']);
            } else {
                foreach ($rolesEliminar as $idRolEliminar) {            
                    $controlUsuarioRol->baja(['idusuario' => $usuario->getId(), 'idrol' => $idRolEliminar]);
                }
            }

            if ($_SESSION['idusuario'] == $datos['idusuario']) {
                $session->updateRol();
            }
        }
    }
}

?>