<?php

class Compra {
    private $idCompra;
    private $coFecha;
    private $objUsuario;
    private $mensajeOperacion;

    //Método constructor
    function __construct(){
        $this->idCompra = "";
        $this->coFecha = "";
        $this->objUsuario = null;
        $this->mensajeOperacion = "";
    }

    function setear($id, $fecha, $objUsuario){
        $this->idCompra = $id;
        $this->coFecha = $fecha;
        $this->objUsuario = $objUsuario;
    }

    //Métodos set
    function setIdCompra($id){
        $this->idCompra = $id;
    }

    function setFecha($fecha){
        $this->coFecha = $fecha;
    }

    function setObjUsuario($objUsuario){
        $this->objUsuario = $objUsuario;
    }

    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }
    
    //Métodos get
    function getIdCompra(){
        return $this->idCompra;
    }

    function getFecha(){
        return $this->coFecha;
    }

    function getObjUsuario(){
        return $this->objUsuario;
    }

    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM compra WHERE idcompra = ". $this->getIdCompra();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objUsuario = null;
                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setId($row['idusuario']);
                        $objUsuario->cargar();
                    }
                    $this->setear($row['idcompra'], $row['cofecha'], $objUsuario); 
                }
            }
        } else {
            $this->setMensajeOperacion("Compra->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO compra(cofecha, idusuario) VALUES('".$this->getFecha()."',".$this->getObjUsuario()->getId().");";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Compra->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Compra->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE compra SET cofecha ='".$this->getFecha()."',idusuario=".$this->getObjUsuario()->getId()." WHERE idcompra=".$this->getIdCompra();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Compra->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Compra->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM compra WHERE idcompra=".$this->getIdCompra();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Compra->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Compra->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM compra ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj = new Compra();
                    $objUsuario = null;
                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setId($row['idusuario']);
                        $objUsuario->cargar();
                    }
                    $obj->setear($row['idcompra'], $row['cofecha'], $objUsuario); 
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("Compra->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>