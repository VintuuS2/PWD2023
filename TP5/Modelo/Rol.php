<?php

class Rol{
    private $idRol;
    private $rolDesc;
    private $mensajeOperacion;

    //Método constructor
    function __construct(){
        $this->idRol = "";
        $this->rolDesc = "";
        $this->mensajeOperacion = "";
    }

    function setear($id,$desc){
        $this->idRol = $id;
        $this->rolDesc = $desc;
    }

    //Métodos set
    function setIdRol($id){
        $this->idRol = $id;
    }

    function setRolDesc($desc){
        $this->rolDesc = $desc;
    }

    function setMensajeOperacion($mensaje){
        $this->mensajeOperacion = $mensaje;
    }
    
    //Métodos get

    function getIdRol(){
        return $this->idRol;
    }

    function getRolDesc(){
        return $this->rolDesc;
    }

    function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }

    //Métodos para BD
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM rol WHERE idrol = ". $this->getIdRol();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idrol'], $row['rodescripcion']); 
                }
            }
        } else {
            $this->setMensajeOperacion("Rol->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO rol(rodescipcion) VALUES(".$this->getRolDesc().");";
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
        $base=new BaseDatos();
        $sql = "UPDATE rol SET rodescripcion=" . $this->getRolDesc()."' WHERE idrol=" . $this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Rol->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->modificar: ".$base->getError());
        }
        return $resp;
    }

    //DUNNO SI USAR ESTE O CAMBIARLO A UPDATE TABLE
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM rol WHERE idrol=".$this->getIdRol();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Rol->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Rol->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM rol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj= new Rol();
                    $obj->setear($row['idrol'], $row['rodescripcion']);
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("Rol->listar: ".$base->getError());
        }
        return $arreglo;
    }

}

?>