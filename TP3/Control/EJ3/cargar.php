<?php
class cargaArchivo
{

  function analizarArchivo($archivo)
  {

    $subirOk = true;
    //controlo que sea imagen

    $extensionesPermitidas = ['.png', '.jpg'];
    $extensionArchivo = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
    if (!in_array($extensionArchivo, $extensionesPermitidas)) {
      $mensaje = "El archivo debe ser de tipo PNG o JPG.";
    } elseif (move_uploaded_file($fileTmp, "../Upload" . $fileName)) {
      $mensaje = "Archivo subido con éxito. <a href='../Upload $fileName' target='_blank'>Descargar archivo</a>";
    } else {
      $mensaje = "Error al subir el archivo.";
    }

    return $mensaje;

    //controlar formatos
    if ($pos1 === false || $pos1 === false) {
      $subirOk = false;
    } else if (move_uploaded_file($_FILES['imagenPeli']['tmp_name'], '../../archivos/' . $nombreArchivo)) {
      $subirOk = true;
    }

    return $subirOk;
  }
}
