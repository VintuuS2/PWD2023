<?php
class Persona {
    // atributos
    private $nombre;
    private $apellido;
    private $edad;
    private $direccion;
    private $estudios;
    private $genero;
    // Método constructor
    public function __construct($nombre, $apellido, $edad, $direccion, $estudios, $genero) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->direccion = $direccion;
        $this->estudios = $estudios;
        $this->genero = $genero;
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
            $salida .= " y soy hombre.";
        } else {
            $salida .= " y soy mujer.";
        }
        return $salida;
    }
}
?>