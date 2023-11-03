<?php

class CompraItem {
    private $idCompraItem;
    private $objProducto;
    private $objCompra;
    private $ciCantidad;
    private $mensajeOperacion;

    //Método constructor
    function __construct(){
        $this->idCompraItem = "";
        $this->objProducto = null;
        $this->objCompra = null;
        $this->ciCantidad = "";
        $this->mensajeOperacion = "";
    }

    function setear($id, $objProducto, $objCompra, $cantidad){
        $this->idCompraItem = $id;
        $this->objProducto = $objProducto;
        $this->objCompra = $objCompra;
        $this->ciCantidad = $cantidad;
    }

    //Métodos set
    function setIdCompraItem($id){
        $this->idCompraItem = $id;
    }

    function setObjProducto($objProducto){
        $this->objProducto = $objProducto;
    }

    function setObjCompra($objCompra){
        $this->objCompra = $objCompra;
    }

    function setCantidad($cantidad){
        $this->ciCantidad = $cantidad;
    }

    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }
    
    //Métodos get
    function getIdCompraItem(){
        return $this->idCompraItem;
    }

    function getObjProducto(){
        return $this->objProducto;
    }

    function getObjCompra(){
        return $this->objCompra;
    }

    function getCantidad(){
        return $this->ciCantidad;
    }

    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraitem WHERE idcompraitem = ". $this->getIdCompraItem();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();

                    $objProducto = new Producto;
                    $objProducto->cargar($row['idproducto']);

                    $objCompra = new Compra;
                    $objCompra->cargar($row['idcompra']);

                    $this->setear($row['idcompraitem'], $objProducto, $objCompra, $row['cicantidad']); 
                }
            }
        } else {
            $this->setMensajeOperacion("CompraItem->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO compraitem(idproducto, idcompra, cicantidad) VALUES(".$this->getObjProducto()->getIdProducto().",".$this->getObjCompra()->getIdCompra().",".$this->getCantidad().");";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("CompraItem->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraItem->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql = "UPDATE compraitem SET idproducto =".$this->getObjProducto()->getIdProducto().",idcompra=".$this->getObjCompra()->getIdCompra().",cicantidad=".$this->getCantidad()." WHERE idcompraitem=".$this->getIdCompraItem();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("CompraItem->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraItem->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM compraitem WHERE idcompraitem=".$this->getIdCompraItem();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("CompraItem->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraItem->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM compraitem ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj = new CompraItem();

                    $objProducto = new Producto;
                    $objProducto->cargar($row['idproducto']);

                    $objCompra = new Compra;
                    $objCompra->cargar($row['idcompra']);

                    $obj->setear($row['idcompraitem'], $objProducto, $objCompra, $row['cicantidad']); 
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("CompraItem->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>