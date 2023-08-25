<?php
class Usuarios {
    private $usuarios = array();

function getUsuario() {
    return $this->usuarios;
}

function setUsuarios($usuarios) {
    $this->usuarios[] = $usuarios;
}

/*$usuarios = array(
    array("usuario" => "usuario1", "clave" => "contraseña1"),
    array("usuario" => "usuario2", "clave" => "contraseña2"),
    // Agrega más usuarios aquí
);*/

function verificarCredenciales($username, $password) {
    global $usuarios;
    $login = false;
    foreach ($usuarios as $usuario) {
        if ($usuario["usuario"] === $username && $usuario["clave"] === $password) {
            $login = true;
        }
    }
    return $login;
}
}

$usuarioManager = new Usuarios();

$usuario1 = array("usuario" => "usuario1", "clave" => "contraseña1");
$usuario2 = array("usuario" => "usuario2", "clave" => "contraseña2");

$usuarioManager->setUsuarios($usuario1);
$usuarioManager->setUsuarios($usuario2);

$usuarios = $usuarioManager->getUsuario();

?>