<?php

class CompraEstado {
    private $idCompraEstado;
    private $objCompra;
    private $objCompraEstadoTipo;
    private $ceFechaIni;
    private $ceFechaFin;
    private $mensajeOperacion;

    //Método constructor
    function __construct(){
        $this->idCompraEstado = "";
        $this->objCompra = null;
        $this->objCompraEstadoTipo = null;
        $this->ceFechaIni = "";
        $this->ceFechaFin = "";
        $this->mensajeOperacion = "";
    }

    function setear($id, $objCompra, $objCompraEstadoTipo, $fechaIni, $fechaFin){
        $this->idCompraEstado = $id;
        $this->objCompra = $objCompra;
        $this->objCompraEstadoTipo = $objCompraEstadoTipo;
        $this->ceFechaIni = $fechaIni;
        $this->ceFechaFin = $fechaFin;
    }

    //Métodos set
    function setIdCompraEstado($id){
        $this->idCompraEstado = $id;
    }

    function setObjCompra($objCompra){
        $this->objCompra = $objCompra;
    }

    function setObjCompraEstadoTipo($objCompraEstadoTipo){
        $this->objCompraEstadoTipo = $objCompraEstadoTipo;
    }

    function setFechaIni($fechaIni){
        $this->ceFechaIni = $fechaIni;
    }

    function setFechaFin($fechaFin){
        $this->ceFechaFin = $fechaFin;
    }

    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }
    
    //Métodos get
    function getIdCompraEstado(){
        return $this->idCompraEstado;
    }

    function getObjCompra(){
        return $this->objCompra;
    }

    function getObjCompraEstadoTipo(){
        return $this->objCompraEstadoTipo;
    }

    function getFechaIni(){
        return $this->ceFechaIni;
    }

    function getFechaFin(){
        return $this->ceFechaFin;
    }

    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraestado WHERE idcompraestado = ". $this->getIdCompraEstado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objCompra = null;
                    $objCompraEstadoTipo = null;
                    if ($row['idcompra'] != null) {
                        $objCompra = new Compra();
                        $objCompra->setIdCompra($row['idcompra']);
                        $objCompra->cargar();
                    }
                    if ($row['idcompraestadotipo'] != null) {
                        $objCompraEstadoTipo = new CompraEstadoTipo();
                        $objCompraEstadoTipo->setIdCompraEstadoTipo($row['idcompraestadotipo']);
                        $objCompraEstadoTipo->cargar();
                    }
                    $this->setear($row['idcompraestado'], $objCompra, $objCompraEstadoTipo, $row['cefechaini'], $row['cefechafin']); 
                }
            }
        } else {
            $this->setMensajeOperacion("CompraEstado->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fechaComienzo = date('Y-m-d H:i:s');
        $sql = "INSERT INTO compraestado(idcompra, idcompraestadotipo, cefechaini, cefechafin) VALUES(".$this->getObjCompra()->getIdCompra().",".$this->getObjCompraEstadoTipo()->getIdCompraEstadoTipo().",'".$fechaComienzo."','".$this->getFechaFin()."');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("CompraEstado->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraEstado->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function finalizar(){
        $resp = false;
        $base = new BaseDatos();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fechaFin = date('Y-m-d H:i:s');
        $sql = "UPDATE compraestado SET cefechafin='" . $fechaFin . "' WHERE idcompraestado=".$this->getIdCompraEstado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("CompraEstado->finalizar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraEstado->finalizar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){ 
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE compraestado SET idcompra =".$this->getObjCompra()->getIdCompra().",idcompraestadotipo=".$this->getObjCompraEstadoTipo()->getIdCompraEstadoTipo().",cefechaini=".$this->getFechaIni().", cefechafin=" . $this->getFechaFin() . " WHERE idcompraestado=".$this->getIdCompraEstado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("CompraEstado->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraEstado->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM compraestado WHERE idcompraestado=".$this->getIdCompraEstado();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("CompraEstado->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraEstado->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraestado ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj = new CompraEstado();
                    $objCompra = null;
                    $objCompraEstadoTipo = null;
                    if ($row['idcompra'] != null) {
                        $objCompra = new Compra();
                        $objCompra->setIdCompra($row['idcompra']);
                        $objCompra->cargar();
                    }
                    if ($row['idcompraestadotipo'] != null) {
                        $objCompraEstadoTipo = new CompraEstadoTipo();
                        $objCompraEstadoTipo->setIdCompraEstadoTipo($row['idcompraestadotipo']);
                        $objCompraEstadoTipo->cargar();
                    }
                    $obj->setear($row['idcompraestado'], $objCompra, $objCompraEstadoTipo, $row['cefechaini'], $row['cefechafin']); 
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("CompraEstado->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>