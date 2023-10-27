<?php

class UsuarioRol{
    private $idUsuario;
    private $idRol;
    private $mensajeOperacion;

    function __construct(){
        $this->idUsuario = "";
        $this->idRol = "";
    }

    function setear($usuario, $rol){
        $this->idUsuario = $usuario;
        $this->idRol = $rol;
    }

    //Métodos set
    function setIdUsuario($usuario){
        $this->idUsuario = $usuario;
    }
    function setIdRol($rol){
        $this->idRol = $rol;
    }
    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }

    //Métodos get
    function getIdUsuario(){
        return $this->idUsuario;
    }
    function getIdRol(){
        return $this->idRol;
    }
    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuariorol WHERE idusuario = " . $this->getIdUsuario() . "AND idrol=" . $this->getIdRol();
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
        $sql = "INSERT INTO usuariorol(idusuario, idrol)  VALUES('".$this->getIdUsuario()."','".$this->getIdRol()."');";
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
        $sql = "UPDATE usuariorol SET idusuario =" . $this->getIdUsuario() . ",idrol=" . $this->getIdRol();
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
        $sql = "DELETE FROM usuariorol WHERE idusuario=" . $this->getIdUsuario() . "AND idrol=" . $this->getIdRol();
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