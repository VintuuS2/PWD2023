<?php

class Producto {
    private $idProducto;
    private $proNombre;
    private $proDetalle;
    private $proCantStock;
    private $proPrecio;
    private $proImagen;
    private $mensajeOperacion;

    //Método constructor
    function __construct(){
        $this->idProducto = "";
        $this->proNombre = "";
        $this->proDetalle = "";
        $this->proCantStock = "";
        $this->proPrecio = "";
        $this->proImagen = "";
        $this->mensajeOperacion = "";
    }

    function setear($id, $nombre, $detalle, $cantStock, $precio, $imagen){
        $this->idProducto = $id;
        $this->proNombre = $nombre;
        $this->proDetalle = $detalle;
        $this->proCantStock = $cantStock;
        $this->proPrecio = $precio;
        $this->proImagen = $imagen;
    }

    //Métodos set
    function setIdProducto($id){
        $this->idProducto = $id;
    }

    function setNombre($nombre){
        $this->proNombre = $nombre;
    }

    function setDetalle($detalle){
        $this->proDetalle = $detalle;
    }

    function setCantStock($cantStock){
        $this->proCantStock = $cantStock;
    }

    function setPrecio($precio){
        $this->proPrecio = $precio;
    }

    function setImagen($imagen){
        $this->proImagen = $imagen;
    }

    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }
    
    //Métodos get
    function getIdProducto(){
        return $this->idProducto;
    }

    function getNombre(){
        return $this->proNombre;
    }

    function getDetalle(){
        return $this->proDetalle;
    }

    function getCantStock(){
        return $this->proCantStock;
    }

    function getPrecio(){
        return $this->proPrecio;
    }

    function getImagen(){
        return $this->proImagen;
    }

    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM producto WHERE idproducto = ". $this->getIdProducto();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock'], $row['proprecio'], $row['proimagen']); 
                }
            }
        } else {
            $this->setMensajeOperacion("Producto->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO producto(pronombre, prodetalle, procantstock, proprecio, proimagen) VALUES('".$this->getNombre()."','".$this->getDetalle()."',".$this->getCantStock().",".$this->getPrecio().",'".$this->getImagen()['name']."');";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Producto->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Producto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE producto SET pronombre ='".$this->getNombre()."',prodetalle='".$this->getDetalle()."',procantstock=".$this->getCantStock().",proprecio=".$this->getPrecio().",proimagen='".$this->getImagen()['name']."' WHERE idproducto=".$this->getIdProducto();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Producto->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Producto->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM producto WHERE idproducto=".$this->getIdProducto();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Producto->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Producto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM producto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj = new Producto();
                    $obj->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock'], $row['proprecio'], $row['proimagen']);
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("Producto->listar: ".$base->getError());
        }
        return $arreglo;
    }
}
?>