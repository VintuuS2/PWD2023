<?php

class UsuarioRol{
    private $objetoUsuario;
    private $objetoRol;
    private $mensajeOperacion;

    function __construct(){
        $this->objetoUsuario = null;
        $this->objetoRol = null;
    }

    function setear($usuario, $rol){
        $this->setObjUsuario($usuario);
        $this->setObjRol($rol);
    }

    //Métodos set
    function setObjUsuario($usuario){
        $this->objetoUsuario = $usuario;
    }
    function setObjRol($rol){
        $this->objetoRol = $rol;
    }
    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }

    //Métodos get
    function getObjUsuario(){
        return $this->objetoUsuario;
    }
    function getObjRol(){
        return $this->objetoRol;
    }
    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $objetoUsuario = new Usuario;
        $objetoRol = new Rol;
        $sql = "SELECT * FROM usuariorol WHERE idusuario = " . $objetoUsuario->getId() . "AND idrol=" . $objetoRol->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['idrol']); 
                }
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->cargar: ".$base->getError());
        }
        return $resp;
    }
    
    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $objetoUsuario = new Usuario;
        $objetoRol = new Rol;
        $sql = "INSERT INTO usuariorol(idusuario, idrol)  VALUES('".$objetoUsuario->getId()."','".$objetoRol->getIdRol()."');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("UsuarioRol->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $objetoUsuario = new Usuario;
        $objetoRol = new Rol;
        $sql = "UPDATE usuariorol SET idusuario =" . $objetoUsuario->getId() . ",idrol=" . $objetoRol->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("UsuarioRol->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->modificar: ".$base->getError());
        }
        return $resp;
    }

    //DUNNO SI USAR ESTE O CAMBIARLO A UPDATE TABLE
    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $objetoUsuario = new Usuario;
        $objetoRol = new Rol;
        $sql = "DELETE FROM usuariorol WHERE idusuario=" . $objetoUsuario->getId() . "AND idrol=" . $objetoRol->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("UsuarioRol->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuariorol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj = new UsuarioRol();
                    $obj->setear($row['idusuario'], $row['idrol']);
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("UsuarioRol->listar: ".$base->getError());
        }
        return $arreglo;
    }

}

?>