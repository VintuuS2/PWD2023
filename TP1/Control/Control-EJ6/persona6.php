<?php
class Persona {
    // atributos
    private $nombre;
    private $apellido;
    private $edad;
    private $direccion;
    private $estudios;
    private $genero;
    private $cantDeportes;
    // Método constructor
    public function __construct($nombre, $apellido, $edad, $direccion, $estudios, $genero, $cantDeportes) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->direccion = $direccion;
        $this->estudios = $estudios;
        $this->genero = $genero;
        $this->cantDeportes = $cantDeportes;
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
    public function setEstudios($estudios) {
        $this->estudios = $estudios;
    }
    public function setGenero($genero) {
        $this->genero = $genero;
    }
    public function setCantDeportes($cantDeportes) {
        $this->cantDeportes = $cantDeportes;
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
    public function getEstudios() {
        return $this->estudios;
    }
    public function getGenero() {
        return $this->genero;
    }
    public function getCantDeportes() {
        return $this->cantDeportes;
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
        $salida .= ", vivo en " . $this->getDireccion();
        if ($this->getEstudios() == "se") {
            $salida .= ", no tengo estudios";
        } elseif ($this->getEstudios() == "ep") {
            $salida .= ", tengo estudios primarios";
        } else {
            $salida .= ", tengo estudios secundarios";
        }
        if ($this->getGenero() == "masculino") {
            $salida .= ", soy hombre.";
        } else {
            $salida .= ", soy mujer";
        }
        switch ($this->getCantDeportes()) {
            case 0: $salida .= " y no practico deportes."; break;
            case 1: $salida .= " y practico 1 deporte"; break;
            default: $salida .= " y practico " . $this->getCantDeportes() . " deportes."; break;
        }
        return $salida;
    }
}
?>