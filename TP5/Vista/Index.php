<?php
include_once '../../configuracionProyecto.php';
include_once '../Util/funciones.php';
include_once './Estructura/header.php';
require_once '../Util/vendor/autoload.php';
?>

<?php
include_once '../../configuracionProyecto.php';
include_once '../Util/funciones.php';
include_once './Estructura/header.php';
require_once '../Util/vendor/autoload.php';
?>

<div class="vh-100 w-100 row bg-dark m-auto">
    <div class="d-flex row justify-content-center align-items-center">
        <div class="text-center">
            <h1 class="text-light">Trabajo de Librerias</h1>
            <h4 class="text-light text-start">
                <p>Para la realización de este trabajo, utilizamos las herramientas de gestión de depencias y bibliotecas para proyectos PHP llamada "Composer". A este lo utilizamos para incluir un SDK de Google Translate para traducir texto de <a href="https://github.com/statickidz" target="_blank">Statickidz</a> que funciona mandando un texto con un idioma target y un idioma source.</p> <br>
                <p>Al mismo tiempo, utilizamos la API de Google para demostrar que no hace falta siempre instalar una biblioteca desde composer para agregar funcionalidades extras a nuestros proyectos. La documentación la obtuvimos de la pagina <a href="https://www.etutorialspoint.com/index.php/341-how-to-convert-text-to-speech-using-php" target="_blank">eTutorialsPoint</a>.</p> <br>
                <p>En la realización de este trabajo notamos las diferentes utilidades que tiene utilizar composer y a su vez entendimos el funcionamiento de un archivo .gitignore.
                    Para poder utilizar este proyecto correctamente, en visual studio code, abrir una terminal en la carpeta del proyecto y escriba el siguiente comando:
                    "<code>cd ./TP5/Util; composer update</code>."</p>
            </h4>

            <h3 class="text-light">Librerias/Api utilizadas: </h3>
            <h3 class="text-light">-Php Google Translate Free</h3>
            <h3 class="text-light">-Google Text to Speech(gTTS Module)</h3>
            <h2 class="text-light">Integrantes del grupo 1</h2>
            <ul class="list-unstyled">
                <li class="text-light">Lautaro Gonzalez FAI-2950</li>
                <li class="text-light">Emiliano Lopez FAI-3357</li>
                <li class="text-light">Valentin Camusso FAI-3208</li>
            </ul>
            <div class="d-flex justify-content-around">
                <a href="./TP5/Vista/Traductor.php" class="btn btn-primary">Traductor Normal</a>
                <a href="./TP5/Vista/traductorConPhpSelf.php" class="btn btn-primary">Traductor Con PHP_SELF</a>
            </div>
        </div>

    </div>
</div>

<?php
include_once './Estructura/footer.php';
?>

<?php
include_once './Estructura/footer.php';
?>