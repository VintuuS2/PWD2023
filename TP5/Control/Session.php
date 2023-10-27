<?php
class Session {
    public function __construct() {
        session_start();
    }

    public function iniciar($nombreUsuario, $psw) {
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        $_SESSION['psw'] = $psw;
    }

    public function validar() {
        if (isset($_SESSION['nombreUsuario']) && isset($_SESSION['psw'])) {  
            return true;
        } else {
            return false;
        }
    }

    public function activa() {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    public function getUsuario() {
        return isset($_SESSION['nombreUsuario']) ? $_SESSION['nombreUsuario'] : null;
    }

    public function getRol() {
        return isset($_SESSION['rol']) ? $_SESSION['rol'] : null;
    }

    public function cerrar() {
        session_unset();
        session_destroy();
    }
}

?>