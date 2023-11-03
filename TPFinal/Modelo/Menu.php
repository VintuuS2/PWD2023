<?php

class Menu{
    private $idMenu;
    private $meNombre;
    private $meDescripcion;
    private $idPadre;
    private $meDeshabilitado;
    private $mensajeOperacion;

    //Método constructor
    function __construct(){
        $this->idMenu = "";
        $this->meNombre = "";
        $this->meDescripcion = "";
        $this->idPadre = "";
        $this->meDeshabilitado = "";
        $this->mensajeOperacion = "";
    }

    function setear($idMenu,$meNombre,$meDescripcion,$idPadre,$meDeshabilitado){
        $this->idMenu = $idMenu;
        $this->meNombre = $meNombre;
        $this->meDescripcion = $meDescripcion;
        $this->idPadre = $idPadre;
        $this->meDeshabilitado = $meDeshabilitado;
    }

    //Métodos set
    function setIdMenu($idMenu){
        $this->idMenu = $idMenu;
    }

    function setMeNombre($meNombre){
        $this->meNombre = $meNombre;
    }

    function setIdPadre($idPadre){
        $this->idPadre = $idPadre;
    }

    function setMeDescripcion($meDescripcion){
        $this->meDescripcion = $meDescripcion;
    }

    function setMeDeshabilitado($meDeshabilitado){
        $this->meDeshabilitado = $meDeshabilitado;
    }

    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }
    
    //Métodos get

    function getIdMenu(){
        return $this->idMenu;
    }

    function getMeNombre(){
        return $this->meNombre;
    }

    function getIdPadre(){
       return $this->idPadre;
    }

    function getMeDescripcion(){
        return $this->meDescripcion;
    }

    function getMeDeshabilitado(){
        return $this->meDeshabilitado;
    }

    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM menu WHERE idmenu = ". $this->getIdMenu();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idmenu'], $row['menombre'],$row['medescripcion'], $row['idpadre'],$row['medeshabilitado']); 
                }
            }
        } else {
            $this->setMensajeOperacion("Menu->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO menu(menombre,medescripcion,idpadre,medeshabilitado) VALUES(".$this->getMeNombre().$this->getMeDescripcion().$this->getIdPadre().$this->getMeDeshabilitado().");";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Menu->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Menu->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql = "UPDATE menu SET menombre=" . $this->getMeNombre(). "medescripcion=" . $this->getMeDescripcion()."idpadre=" . $this->getIdPadre()."medeshabilitado=" . $this->getMeDeshabilitado() . "' WHERE idmenu=" . $this->getIdMenu();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Menu->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Menu->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM menu WHERE idmenu=".$this->getIdMenu();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Menu->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Menu->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM menu ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj= new Menu();
                    $obj->setear($row['idmenu'], $row['menombre'], $row['medescripcion'], $row['idpadre'], $row['medeshabilitado']);
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("Menu->listar: ".$base->getError());
        }
        return $arreglo;
    }

}

?>