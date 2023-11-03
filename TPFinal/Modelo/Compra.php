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
                    $this->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock']); 
                }
            }
        } else {
            $this->setMensajeOperacion("Producto->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO producto(pronombre, prodetalle, procantstock) VALUES('".$this->getNombre()."','".$this->getDetalle()."',".$this->getCantStock().");";
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
        $base=new BaseDatos();
        $sql = "UPDATE producto SET pronombre ='".$this->getNombre()."',prodetalle='".$this->getDetalle()."',procantstock=".$this->getCantStock()." WHERE idproducto=".$this->getIdProducto();
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
                    $obj->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock']);
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