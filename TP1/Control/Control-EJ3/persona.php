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
    public function saludo() {

    }
}
?>