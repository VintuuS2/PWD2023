<?php

class UsuarioRol{
    private $objUsuario;
    private $objRol;
    private $mensajeOperacion;

    function __construct(){
        $this->objUsuario = null;
        $this->objRol = null;
    }

    function setear($usuario, $rol){
        $this->objUsuario = $usuario;
        $this->objRol = $rol;
    }

    //Métodos set
    function setObjUsuario($usuario){
        $this->objUsuario = $usuario;
    }
    function setObjRol($rol){
        $this->objRol = $rol;
    }
    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }

    //Métodos get
    function getObjUsuario(){
        return $this->objUsuario;
    }
    function getObjRol(){
        return $this->objRol;
    }
    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $objUsuario = new Usuario;
        $objRol = new Rol;
        $sql = "SELECT * FROM usuariorol WHERE idusuario = " . $objUsuario->getId() . "AND idrol=" . $objRol->getIdRol();
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
        $objUsuario = new Usuario;
        $objRol = new Rol;
        $sql = "INSERT INTO usuariorol(idusuario, idrol)  VALUES('".$objUsuario->getId()."','".$objRol->getIdRol()."');";
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
        $objUsuario = new Usuario;
        $objRol = new Rol;
        $sql = "UPDATE usuariorol SET idusuario =" . $objUsuario->getId() . ",idrol=" . $objRol->getIdRol();
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
        $objUsuario = new Usuario;
        $objRol = new Rol;
        $sql = "DELETE FROM usuariorol WHERE idusuario=" . $objUsuario->getId() . "AND idrol=" . $objRol->getIdRol();
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