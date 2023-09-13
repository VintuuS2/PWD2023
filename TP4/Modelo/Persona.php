<?php
class Persona {
    //Atributos
    private $nroDni;
    private $nombre;
    private $apellido;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $mensajeOperacion;
 
    // Método constructor
    public function __construct () {
        $this->nroDni = "";
        $this->nombre = "";
        $this->apellido = "";
        $this->fechaNac = "";
        $this->telefono = "";
        $this->domicilio = "";
        $this->mensajeOperacion = "";
    }

    public function setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio){
        $this->nroDni = $nroDni;
        $this->apellido = $apellido;
        $this->nombre = $nombre;
        $this->fechaNac = $fechaNac;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
    }

    // Métodos set
    public function setNroDni($documento){
        $this->nroDni = $documento;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setFechaNac($fechaNac){
        $this->fechaNac = $fechaNac;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setDomicilio($domicilio){
        $this->domicilio = $domicilio;
    }
    public function setMensajeOperacion($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    // Métodos get
    public function getNroDni(){
        return $this->nroDni;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getFechaNac(){
        return $this->fechaNac;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getDomicilio(){
        return $this->domicilio;
    }
    public function getMensajeOperacion() {
        return $this->mensajeOperacion;
    }

    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona WHERE NroDni = ". $this->getNroDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']); 
                }
            }
        } else {
            $this->setMensajeOperacion("Persona->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO persona(NroDni,Nombre,Apellido,fechaNac,Telefono,Domicilio)  VALUES(".$this->getNroDni().",'".$this->getNombre()."','".$this->getApellido()."','".$this->getFechaNac()."','".$this->getTelefono()."','".$this->getDomicilio()."');";
        if ($base->Iniciar()) {
            if ($nroDni = $base->Ejecutar($sql)) {
                $this->setNroDni($nroDni);
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE persona SET NroDni=".$this->getNroDni().",Apellido='".$this->getApellido()."',Nombre=". $this->getNombre().",fechaNac='".$this->getFechaNac()."',Telefono=".$this->getTelefono().",Domicilio=".$this->getDomicilio()." WHERE NroDni=".$this->getNroDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Persona->modificar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM persona WHERE NroDni=".$this->getNroDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("Persona->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Persona->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM persona ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){    
                while ($row = $base->Registro()){
                    $obj= new Persona();
                    $obj->setear($row['NroDni'], $row['Apellido'], $row['Nombre'], $row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    array_push($arreglo, $obj);
                }
               
            }     
        } else {
            $this->setMensajeOperacion("Persona->listar: ".$base->getError());
        }
        return $arreglo;
    }
}

?>