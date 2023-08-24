<?php
class Matematicas {
    /** Esta función recibe dos numeros con una operación a realizar y devuelve el resultado
     * @param INT $num1
     * @param INT $num2
     * @param STRING $operacion
     * @return INT
     */
    public function realizarOperacion($num1, $num2, $operacion) {
        switch ($operacion) {
            case "+": $resultado = $num1+$num2; break;
            case "-": $resultado = $num1-$num2; break;
            default: $resultado = $num1*$num2; break;
        }
        return $resultado;
    }
}
?>