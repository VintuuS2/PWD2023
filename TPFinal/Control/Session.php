<?php

class Session{
    private $usuario;
    private $pass;
    private $userObj;
    private $objRoles;

    function __construct(){
        if (session_start()){
            $_SESSION['ROOT'] = $_SERVER['DOCUMENT_ROOT'] . '/PWD2023/TPFinal/';
            $this->usuario = "";
            $this->pass = "";
            $this->userObj = null;
            $this->objRoles = null;
        }
    }

    //Funciones set
    function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    function setPass($pass){
        $this->pass = $pass;
    }

    function setUserObj($obj){
        $this->userObj = $obj;
    }

    function setRoles($roles){
        $this->objRoles = $roles;
    }

    //Funciones get
    function getUsuario(){
        return $this->usuario;
    }

    function getPass(){
        return $this->pass;
    }

    function getUserObj(){
        if (isset($_SESSION['idusuario']) && is_null($this->userObj)){
            $busqueda['idusuario'] = $_SESSION['idusuario'];
            $usuario = new AbmUsuario;
            $elUsuario = $usuario->buscar($busqueda);
            $objUsuario = $elUsuario[0];
        } else {
            $objUsuario = $this->userObj;
        }
        return $objUsuario;
    }

    function getRoles(){
        if (isset($_SESSION['idusuario']) && is_null($this->objRoles)){
            $busqueda['idusuario'] = $_SESSION['idusuario'];
            $usuarioRol = new AbmUsuarioRol;
            $roles = $usuarioRol->buscar($busqueda);
            foreach ($roles as $rol){
                $unRol[] = $rol->getObjRol();
            }
            $objRol = $unRol;
        } else {
            $objRol = $this->objRoles;
        }
        return $objRol;
    }

    //Funciones session
    function iniciar($email, $psw){
        $login['usmail'] = $email;
        $login['uspass'] = $psw;
        $resp = false;
        $usuarioObj = new AbmUsuario();
        $listaUsuarios = $usuarioObj->buscar($login);
        if (count($listaUsuarios)>0 && is_null($listaUsuarios[0]->getHabilitado())){
            $this->setUserObj($listaUsuarios[0]);
            $_SESSION['idusuario'] = $listaUsuarios[0]->getId();
            $listaObjRoles = $this->getRoles();
            foreach ($listaObjRoles as $unRol){
                $roles[] = $unRol->getIdRol();
            }
            $_SESSION['idroles'] = $roles;
            $resp = true;
        } else {
            $this->cerrar();
        }
        return $resp;
    }

    /**
     * Valida si la Sesión está activa y si existe un idusuario
     * @return BOOL $resp
    */
    function validar(){
        $resp = false;
        if ($this->activa() && isset($_SESSION['idusuario'])){
            $resp = true;
            $this->updateRol();
        }
        return $resp;
    }

    /**
     * Devuelve true si la Sesión está activa
     * @return BOOL $resp
     */
    function activa(){
        $resp = false;
        $isActive = session_status();
        $resp = true;
        if ($isActive == 2){
        }
        return $resp;
    }

    /**
     * Destruye la información de la Sesión actual
     */
    function cerrar(){
        session_destroy();
    }

    /**
     * Actualiza los roles de la sesión
     */
    function updateRol(){
        $roles = $this->getRoles();
        foreach ($roles as $rol){
            $listaRoles[] = $rol->getIdRol();
        }
        unset($_SESSION['idroles']);
        $_SESSION['idroles'] = $listaRoles;
    }
}

?>