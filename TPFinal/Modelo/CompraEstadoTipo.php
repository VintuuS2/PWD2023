<?php

class CompraEstadoTipo {
    private $idCompraEstadoTipo;
    private $cetDescripcion;
    private $cetDetalle;
    private $mensajeOperacion;

    //Método constructor
    function __construct(){
        $this->idCompraEstadoTipo = "";
        $this->cetDescripcion = "";
        $this->cetDetalle = "";
        $this->mensajeOperacion = "";
    }

    function setear($id, $descripcion, $detalle){
        $this->idCompraEstadoTipo = $id;
        $this->cetDescripcion = $descripcion;
        $this->cetDetalle = $detalle;
    }

    //Métodos set
    function setIdCompraEstadoTipo($id){
        $this->idCompraEstadoTipo = $id;
    }

    function setDescripcion($descripcion){
        $this->cetDescripcion = $descripcion;
    }

    function setDetalle($detalle){
        $this->cetDetalle = $detalle;
    }

    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }
    
    //Métodos get
    function getIdCompraEstadoTipo(){
        return $this->idCompraEstadoTipo;
    }

    function getDescripcion(){
        return $this->cetDescripcion;
    }

    function getDetalle(){
        return $this->cetDetalle;
    }

    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraestadotipo WHERE idcompraestadotipo = ". $this->getIdCompraEstadoTipo();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idcompraestadotipo'], $row['cetdescripcion'], $row['cetdetalle']); 
                }
            }
        } else {
            $this->setMensajeOperacion("CompraEstadoTipo->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO compraestadotipo(cetdescripcion, cetdetalle) VALUES('".$this->getDescripcion()."','".$this->getDetalle()."');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("CompraEstadoTipo->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraEstadoTipo->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE compraestadotipo SET cetdescripcion ='".$this->getDescripcion()."',cetdetalle='".$this->getDetalle()."' WHERE idcompraestadotipo=".$this->getIdCompraEstadoTipo();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("CompraEstadoTipo->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraEstadoTipo->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM compraestadotipo WHERE idcompraestadotipo=".$this->getIdCompraEstadoTipo();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("CompraEstadoTipo->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraEstadoTipo->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraestadotipo ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj = new CompraEstadoTipo();
                    $obj->setear($row['idcompraestadotipo'], $row['cetdescripcion'], $row['cetdetalle']); 
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("CompraEstadoTipo->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>