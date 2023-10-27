<?php

class Session{
    private $user;
    private $nombreUsuario;
    private $userRol;
    private $password;
    private $active;

    //Método constructor
    /**
     * Este es el método constructor de la clase Session
     * @param OBJ $obj
     * @param STR $nombreUsuario
     * @param INT $pass
     */
    function __construct($obj, $nombreUsuario, $pass){
        $this->user = $obj;
        $this->nombreUsuario = $nombreUsuario;
        $this->password = $pass;
        $this->setActive(session_start());
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

    function setActive($activo){
        $this->active = $activo;
    }

    //Métodos get
    function getUser(){
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
        if (!is_null($this->getUser())){
            $unUsuarioRol = new AbmUsuarioRol();
            $consulta = $unUsuarioRol->buscar($_SESSION['iduser']);
            $this->setUserRol($consulta[0]['idrol']);
        }
        return $this->userRol;
    }

    function getActive(){
        return $this->active;
    }

    //Funciones
    function iniciar($usuario, $contrasenia){
        //SETEA ATRIBUTOS USUARIO Y CONTRASEÑA
        $this->setNombreUsuario($usuario);
        $this->setPassword($contrasenia);
        if ($this->validar()){
            $_SESSION['iduser'] = $this->getUser()->getId();
        }
    }

    function validar(){
        $resp = false;
        if (isset($usuario) && isset($contrasenia)){
            $login['usnombre'] = $usuario;
            $login['uspass'] = $contrasenia;
            $unUser = new AbmUsuario();
            $unUsuario = $unUser->buscar($login);
            if (count($unUsuario)>0){
                $resp = true;
                $this->setUser($unUsuario[0]);
            }
        }
        return $resp;
    }

    function activa(){
        $resp = false;
        $isActive = session_status();
        if ($isActive==2){
            $resp = true;
        }
        return $resp;
    }

    function cerrar(){
        $this->setActive(false);
        session_destroy();
    }

}

?>