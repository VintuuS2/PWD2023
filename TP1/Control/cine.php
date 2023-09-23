<?php
class Cine {
    /** Esta función recibe la edad de una persona y si es o no estudiante, devuelve el precio de la entrada al cine
     * @param INT $edad
     * @param BOOLEAN $esEstudiante
     * @return INT
     */
    public function calcularEntrada($edad, $esEstudiante) {
        if ($esEstudiante == "si") {
            if ($edad < 12) {
                $precio = "160";
            } else {
                $precio = "180";
            }
        } else {
            $precio = "300";
        }
        return $precio;
    }
}
?>