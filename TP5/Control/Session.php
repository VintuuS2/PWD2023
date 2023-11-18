<?php

class Session{
    private $nombreUsuario;
    private $password;
    private $user;
    private $userRol;

    //Método constructor
    /**
     * Este es el método constructor de la clase Session
     */
    function __construct(){
        if (session_start()){
            $_SESSION['ROOT'] = $_SERVER['DOCUMENT_ROOT'] . '/PWD2023/TP5/';
            $this->nombreUsuario = "";
            $this->password = "";
            $this->user = null;
            $this->userRol = null;
        }
    }

    //Métodos set
    function setUser($usuario){
        $this->user = $usuario;
    }

    function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }

    function setPassword($password){
        $this->password = $password;
    }

    function setUserRol($userRol){
        $this->userRol = $userRol;
    }

    //Métodos get
    function getUser(){
        $unUsuario = null;
        if ($this->activa()){
            $unUsuario = $this->user;
        }
        return $unUsuario;
    }

    function getNombreUsuario(){
        return $this->nombreUsuario;
    }

    function getPassword(){
        return $this->password;
    }

    function getUserRol(){
        $listaRoles = array();
        if ($this->validar()){
            $param['idusuario'] = $_SESSION['idusuario'];
            $unUsuarioRol = new AbmUsuarioRol();
            //$usuario['idusuario'] = $this->getUser()->getId();
            $consulta = $unUsuarioRol->buscar($param);
            if (count($consulta)>0){
                $listaRoles = $consulta;
            }
        }
        return $listaRoles;
    }

    //Funciones

    /** Inicia y valida la sesión
     * @param STR $usuario
     * @param STR $contrasenia
     * @return BOOL
     */
    function iniciar($usuario, $psw){
        $resp = false;
        $unUser = new AbmUsuario();
        $login['usnombre'] = $usuario;
        $login['uspass'] = $psw;
        $unUsuario = $unUser->buscar($login);
        if (count($unUsuario)>0 && is_null($unUsuario[0]->getHabilitado())){
            $this->setUser($unUsuario[0]);
            $_SESSION['idusuario'] = $this->getUser()->getId();
            $resp = true;
        } else {
            $this->cerrar();
        }
        return $resp;
    }

    function validar(){
        $resp = false;
        if ($this->activa() && isset($_SESSION['idusuario'])){
            $resp = true;
        }
        return $resp;
    }

    function activa(){
        $resp = false;
        $isActive = session_status();
        $resp = true;
        if ($isActive == 2){
        }
        return $resp;
    }

    function cerrar(){
        session_destroy();
    }

}

?>