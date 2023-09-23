<?php
class Persona {
    // atributos
    private $nombre;
    private $apellido;
    private $edad;
    private $direccion;
    // Método constructor
    public function __construct($nombre, $apellido, $edad, $direccion) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->direccion = $direccion;
    }
    // Métodos set
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setEdad($edad) {
        $this->edad = $edad;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    // Métodos get
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getEdad() {
        return $this->edad;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    /** Esta funcion devuelve un mensaje de saludo con los datos de la persona guardada
     * @return STRING
     */
    public function saludo() {
        $salida = "Hola, soy " . $this->getNombre() . " " . $this->getApellido();
        if ($this->getEdad() >=18) {
            $salida .= ", soy mayor de edad";
        } else {
            $salida .= ", soy menor de edad";
        }
            $salida .= " y vivo en " . $this->getDireccion() . ".";
        return $salida;
    }
}
?>