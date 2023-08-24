<?php
class Numero {
    /** Esta función obtiene un número y devuelve 1 si es positivo, -1 si es negativo y 0 si el número es cero.
     * @param INT $numero
     * @return INT
     */
    public function obtenerTipo($numero) {
        switch ($numero) {
            case 0: $resultado = 0; break;
            case $numero > 0: $resultado = 1; break;
            case $numero < 0: $resultado = -1; break;
        }
        return $resultado;
    }
}
?>