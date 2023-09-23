<?php
class Pwd {
    /** Esta función obtiene un arreglo de las horas de cursada de pwd en cada día de la semana y devuelve la suma
     * @param ARRAY $arregloHoras
     * @return INT
     */
    public function sumarHoras($arregloHoras) {
        $suma = 0;
        foreach ($arregloHoras as $hora) {
            $suma += $hora;
        }
        return $suma;
    }
}

?>