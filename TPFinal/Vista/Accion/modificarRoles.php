<?php
$titulo = "Roles Modificados";

include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";

//Recibe los datos del form enviado por ajax

$datos = data_submitted();
$error = false;
$mensaje = "";
if (!isset($datos['usroles'])) {
    $datos['usroles'] = -1;
}
if (isset($datos['idusuario']) && isset($datos['usnombre']) && isset($datos['usroles'])) {

    // Obtengo los datos de los inputs y checkbox
    $ids = $datos['idusuario'];
    $nombres = $datos['usnombre'];
    $roles = $datos['usroles'];

    // Creacion de controles
    $controlUsuario = new AbmUsuario();
    $controlUsuarioRol = new AbmUsuarioRol();
    $controlRol = new AbmRol();

    // Foreach de Usuarios
    foreach ($ids as $id) {

        //Encuentro el usuario
        $usuarioBuscado = $controlUsuario->buscar(['idusuario' => $id]);


        // Checkeo que exista
        if (!empty($usuarioBuscado)) {

            $usuario = $usuarioBuscado[0];
            $listaRoles = $controlRol->buscar(null);
            $roleNameToIdMap = [];

            //Obtengo los nombres de todos los Roles
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

            //Recorro los roles
            foreach ($idRoles as $idRol) {

                // Verifica si la relación usuario-rol que se quiere ingresar ya existe 
                $relacionExistente = $controlUsuarioRol->buscar(['idusuario' => $usuario->getId(), 'idrol' => $idRol]);

                if (empty($relacionExistente)) {
                    // La relación no existe, entonces podes insertarla
                    $controlUsuarioRol->alta(['idusuario' => $usuario->getId(), 'idrol' => $idRol]);
                }
            }

            //Obtengo los roles que tiene el usuario
            $rolesActuales = $controlUsuarioRol->buscar(['idusuario' => $usuario->getId()]);

            $rolesEliminar = [];

            //Obtengo los roles a eliminar
            foreach ($rolesActuales as $rolActual) {
                $idRolActual = $rolActual->getObjRol()->getIdRol();
                if (!in_array($idRolActual, $idRoles)) {
                    $rolesEliminar[] = $idRolActual;
                }
            }

            // Chequea si la cantidad de roles que se quiere eliminar es la misma a la que tiene asignada y si es asi se le asigna el rol de cliente
            if (count($rolesEliminar)==count($rolesActuales)){
                foreach ($rolesEliminar as $idRolEliminar) {
                    $controlUsuarioRol->baja(['idusuario' => $usuario->getId(), 'idrol' => $idRolEliminar]);
                }
                $controlUsuarioRol->alta(['idusuario' => $usuario->getId(), 'idrol' => '3']);
            } else {
                //sino se borran sin problema
                foreach ($rolesEliminar as $idRolEliminar) {            
                    $controlUsuarioRol->baja(['idusuario' => $usuario->getId(), 'idrol' => $idRolEliminar]);
                }
            }

            //Si el usuario se modifica a si mismo se updatean sus roles
            if ($_SESSION['idusuario'] == $datos['idusuario']) {
                $session->updateRol();
            }
        }
    }
}

?>