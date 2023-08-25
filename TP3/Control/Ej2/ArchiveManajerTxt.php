<?php
class ArchiveManagerTxt {
    private $archivo;

    public function __construct($archivo) {
        $this->archivo = $archivo;
    }

    public function mostrarContenido() {
        if ($this->archivo["type"] === "text/plain") {
            $contenido = file_get_contents($this->archivo["tmp_name"]);
            $echo = "<textarea rows='10' cols='50'>$contenido</textarea>";
        } else {
            $echo = "El archivo debe ser de tipo TXT.";

        }
        return $echo;
    }
}
?>