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
        if (!is_null($this->getUser())){
            $unUsuarioRol = new AbmUsuarioRol();
            //$usuario['idrol'] = $consulta[0]['idrol'];
            $usuario['idusuario'] = $this->getUser()->getId();
            $consulta = $unUsuarioRol->buscar($usuario);
            $this->setUserRol($consulta[0]->getIdRol());
            /*$this->setUserRol($consulta[0]['idrol']);
            $_SESSION['idrol'] = $this->getUserRol();*/
        }
        return $this->userRol;
    }

    //Funciones
    /**
     * Inicia y valida la sesión
     * @param STR $usuario
     * @param STR $contrasenia
     * @return BOOL
     */
    function iniciar($usuario, $psw){
        //SETEA ATRIBUTOS USUARIO Y CONTRASEÑA
        $ok = false;
        $this->setNombreUsuario($usuario);
        $this->setPassword($psw);
        if ($this->validar()){
            $_SESSION['idusuario'] = $this->getUser()->getId();
            $ok = true;
        }
        return $ok;
    }

    function validar(){
        $resp = false;
        $login['usnombre'] = $this->getNombreUsuario();
        $login['uspass'] = $this->getPassword();
        $unUser = new AbmUsuario();
        $unUsuario = $unUser->buscar($login);
        echo "<br>";
        print_r($unUsuario);
        if (count($unUsuario)>0){
            $resp = true;
            $this->setUser($unUsuario[0]);
        }
        echo "<br>";
        print_r($this->getUser());
        echo "<br>";
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
        session_destroy();
    }

}

?>