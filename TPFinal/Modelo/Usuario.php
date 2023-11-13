<?php

class Usuario{
    //Atributos
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail;
    private $usDeshabilitado;
    private $mensajeOperacion;

    //Método constructor
    function __construct(){
        $this->idUsuario = "";
        $this->usNombre = "";
        $this->usPass = "";
        $this->usMail = "";
        $this->usDeshabilitado = NULL;
        $this->mensajeOperacion = "";
    }

    function setear($id, $nombre, $pass, $mail, $habilitado){
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setPass($pass);
        $this->setMail($mail);
        $this->setHabilitado($habilitado);
    }
    
    //Métodos set
    function setId($id){
        $this->idUsuario = $id;
    }

    function setNombre($nombre){
        $this->usNombre = $nombre;
    }

    function setPass($pass){
        $this->usPass = $pass;
    }

    function setMail($mail){
        $this->usMail = $mail;
    }

    function setHabilitado($habilitado){
        $this->usDeshabilitado = $habilitado;
    }

    function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion = $mensajeOperacion;
    }

    //Métodos get
    function getId(){
        return $this->idUsuario;
    }
    function getNombre(){
        return $this->usNombre;
    }
    function getPass(){
        return $this->usPass;
    }
    function getMail(){
        return $this->usMail;
    }
    function getHabilitado(){
        return $this->usDeshabilitado;
    }

    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario WHERE idusuario = " . $this->getId();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                }
            }
        } else {
            $this->setMensajeOperacion("Usuario->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $habilitado = $this->getHabilitado();
        $habilitadoSql = ($habilitado == 'null' || $habilitado == null) ? "NULL" : "'$habilitado'";
        $sql = "INSERT INTO usuario(usnombre, uspass, usmail, usdeshabilitado)  VALUES('".$this->getNombre()."','".$this->getPass()."','".$this->getMail()."',$habilitadoSql);";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Usuario->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $habilitado = $this->getHabilitado();
        $habilitadoSql = ($habilitado == 'null' || $habilitado == null) ? "NULL" : "'$habilitado'";
        $sql = "UPDATE usuario SET usnombre = '".$this->getNombre()."', uspass = '".$this->getPass()."', usmail = '".$this->getMail()."', usdeshabilitado = $habilitadoSql WHERE idusuario = '".$this->getId()."'";
        
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Usuario->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM usuario WHERE idusuario=".$this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Usuario->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->eliminar: ".$base->getError());
        }
        return $resp;
    }

    function deshabilitar(){
        $resp = false;
        $base = new BaseDatos();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha = date('Y-m-d H:i:s');
        $sql = "UPDATE usuario SET usdeshabilitado='$fecha' WHERE idusuario=" . $this->getId();
        if ($base->Iniciar()){
            if ($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensajeOperacion("Usuario->deshabilitar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->deshabilitar: " . $base->getError());
        }
        return $resp;
    }

    function habilitar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE usuario SET usdeshabilitado=NULL WHERE idusuario=" . $this->getId();
        if ($base->Iniciar()){
            if ($base->Ejecutar($sql)){
                $resp = true;
            } else {
                $this->setMensajeOperacion("Usuario->habilitar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Usuario->habilitar: " . $base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj = new Usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("Usuario->listar: ".$base->getError());
        }
        return $arreglo;
    }

}

?>