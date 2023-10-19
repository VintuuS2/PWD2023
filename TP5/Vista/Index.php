<?php
$tituloPagina = "TP5-Inicio";
include_once '../../configuracionProyecto.php';
include_once '../Util/funciones.php';
include_once './Estructura/header.php';
require_once '../Util/vendor/autoload.php';
?>

<div class="w-100 row bg-dark m-auto py-5">
    <div class="d-flex row justify-content-center align-items-center">
        <div class="col-12 col-md-8 col-xl-6 text-light h4">
            <div>
                <h1 class="text-center">Trabajo de Librerias</h1>
                <p>Para la realización de este trabajo, utilizamos las herramientas de gestión de depencias y bibliotecas para proyectos PHP llamada "Composer". A este lo utilizamos para incluir un SDK de Google Translate para traducir texto de <a href="https://github.com/statickidz" target="_blank">Statickidz</a> que funciona mandando un texto con un idioma target y un idioma source.</p> <br>
                <p>Al mismo tiempo, utilizamos la API gTTS Module(<i>Google Text-to-Speech</i>) para demostrar que no hace falta siempre instalar una biblioteca desde composer para agregar funcionalidades extras a nuestros proyectos. La documentación la obtuvimos de la pagina <a href="https://www.etutorialspoint.com/index.php/341-how-to-convert-text-to-speech-using-php" target="_blank">eTutorialsPoint</a>.</p> <br>
                <p>En la realización de este trabajo notamos las diferentes utilidades que tiene utilizar composer y a su vez entendimos el funcionamiento del archivo .gitignore.</p>
                <p><b class="text-danger">IMPORTANTE:</b> Para poder utilizar este proyecto correctamente, en visual studio code, abrir una terminal en la carpeta del proyecto y escriba el siguiente comando:
                    "<code>cd ./TP5/Util; composer update</code>."</p>
            </div>
            <div>
                <h1 class="text-center">Traductores</h1>
                <p>Creamos dos traductores exactamente iguales, pero con un enfoque diferente en la forma en que procesan la traducción y muestran los resultados. Ambos traductores están diseñados para convertir texto de un idioma a otro y permitir escuchar una pronunciación en voz alta del texto traducido, pero utilizan distintas técnicas de implementación.</p>
                <p>El primer traductor sigue el método visto en la materia en el que el formulario de traducción se envía a través de una acción específica que apunta a un archivo alojado en una carpeta llamada "Accion". Cuando el usuario ingresa el texto que desea traducir y hace clic en el botón de enviar, los resultados se muestran en una nueva página.</p>
                <p>El segundo traductor, por otro lado, se basa en la capacidad de autollamarse utilizando la variable PHP_SELF. Esto significa que, después de que el usuario ingrese el texto a traducir y haga clic en el botón de enviar, el formulario se procesa en la misma página sin necesidad de redirigir a una nueva ubicación. Los resultados de la traducción se presentan en la misma página, lo que ofrece una experiencia de usuario más fluida y evita la necesidad de cambiar de página.</p>
            </div>
            <div class="d-flex justify-content-around">
                <a href="./Traductor.php" class="btn btn-primary">Traductor normal</a>
                <a href="./traductorConPhpSelf.php" class="btn btn-primary">Traductor con PHP_SELF</a>
            </div>
            <div class="mt-5">
                <h3>Librerias/Api utilizadas: </h3>
                <h4>-Php Google Translate Free</h4>
                <h4>-Google Text to Speech(gTTS Module)</h4>
            </div>
        </div>
    </div>
</div>

<?php
include_once './Estructura/footer.php';
?>