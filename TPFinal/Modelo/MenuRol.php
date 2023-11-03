<?php

class MenuRol{
    private $objMenu;
    private $objRol;
    private $mensajeOperacion;
    
    //Método constructor
    function __construct(){
        $this->objMenu = null;
        $this->objRol = null;
    }

    function setear($objMenu,$objRol){
        $this->objMenu = $objMenu;
        $this->objRol = $objRol;
    }

    //Métodos set
    function setObjMenu($objMenu){
        $this->objMenu = $objMenu;
    }

    function setObjRol($objRol){
        $this->objRol = $objRol;
    }

    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }
    
    //Métodos get

    function getObjMenu(){
        return $this->objMenu;
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
        $objMenu = new Menu;
        $objRol = new Rol;
        $sql = "SELECT * FROM menurol WHERE idmenu = ". $objMenu->getIdMenu(). "AND idrol = " . $objRol->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idmenu'], $row['idrol']); 
                }
            }
        } else {
            $this->setMensajeOperacion("MenuRol->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $objMenu = new Menu;
        $objRol = new Rol;
        $sql="INSERT INTO menurol(idmenu,idrol) VALUES(". $objMenu->getIdMenu().$objRol->getIdRol().");";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("MenuRol->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("MenuRol->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $objMenu = new Menu;
        $objRol = new Rol;
        $sql = "UPDATE menurol SET idmenu=" . $objMenu->getIdMenu(). ",idrol=" . $objRol->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("MenuRol->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("MenuRol->modificar: ".$base->getError());
        }
        return $resp;
    }

    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $objMenu = new Menu;
        $objRol = new Rol;
        $sql="DELETE FROM menurol WHERE idmenu=" . $objMenu->getIdMenu() . "AND idrol=" . $objRol->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("MenuRol->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("MenuRol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM menurol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj= new MenuRol();
                    $obj->setear($row['idmenu'], $row['merol']);
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("MenuRol->listar: ".$base->getError());
        }
        return $arreglo;
    }

}

?>