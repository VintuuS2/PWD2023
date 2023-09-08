<?php
class Auto {
    //Atributos
    private $patente;
    private $marca;
    private $modelo;
    private $objDuenio;
    private $mensajeOperacion;

    //Método constructor
    public function __construct () {
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->objDuenio = null;
        $this->mensajeOperacion = "";
    }
    
    public function setear($patente, $marca, $modelo, $objDuenio) {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setObjDuenio($objDuenio);
    }

    // Métodos set
    public function setPatente ($patente) {
        $this->patente = $patente;
    }
    public function setMarca ($marca) {
        $this->marca = $marca;
    }
    public function setModelo ($modelo) {
        $this->modelo = $modelo;
    }
    public function setObjDuenio ($objDuenio) {
        $this->objDuenio = $objDuenio;
    }
    public function setMensajeOperacion ($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    // Métodos get
    public function getPatente () {
        return $this->patente;
    }
    public function getMarca () {
        return $this->marca;
    }
    public function getModelo () {
        return $this->modelo;
    }
    public function getObjDuenio () {
        return $this->objDuenio;
    }
    public function getMensajeOperacion () {
        return $this->mensajeOperacion;
    }
    
    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE Patente = " . $this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objDuenio = new Persona();
                    $objDuenio->cargar($row['dniDuenio']);
                    $this->setear($row['patente'], $row['marca'], $row['modelo'], $objDuenio,"");
                }
            }
        } else {
            $this->setMensajeOperacion("Auto->cargar: ".$base->getError());
        }
        return $resp;
    }
    
    public function insertar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO auto(Patente, Marca, Modelo, DniDuenio)  VALUES('".$this->getPatente()."','".$this->getMarca()."','".$this->getModelo()."',".$this->getObjDuenio()->getNroDni().");";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto SET Patente ='".$this->getPatente()."',Marca='".$this->getMarca()."',Modelo='".$this->getModelo()."'
        ,DniDuenio=".$this->getObjDuenio()->getNroDni()." WHERE Patente='".$this->getPatente()."'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE Patente=".$this->getPatente();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj = new Auto();
                    $objDuenio = new Persona();
                    $objDuenio->setNroDni($row['DniDuenio']);
                    $objDuenio->cargar();
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objDuenio);
                    array_push($arreglo, $obj);
                }
            }     
        } else {
            $this->setMensajeOperacion("Auto->listar: ".$base->getError());
        }
        return $arreglo;
    }
    
}
?>