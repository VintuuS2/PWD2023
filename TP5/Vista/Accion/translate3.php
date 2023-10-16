<?php

include_once '../../../configuracionProyecto.php';
include_once '../../Util/funciones.php';
include_once '../Estructura/header.php';
require_once '../../Util/vendor/autoload.php';


$datos = data_submitted();

use Statickidz\GoogleTranslate;

if (isset($datos['txt'] )&& isset($datos['tgt']) && isset($datos['src'])){
    $txt = $datos['txt'];
    $tgt = $datos['tgt'];
    $src = $datos['src'];

    $web = "http://translate.google.com/translate_tts";
    $base64 = "data:audio/wav;base64,";

    $translator = new GoogleTranslate();

    $translate = $translator->translate($src, $tgt, $txt);

    $url = $web."?".http_build_query([
        'ie' => 'UTF-8',
        'client' => 'gtx',
        'q' => $translate,
        'tl' => $tgt
    ]);

    $file = file_get_contents($url);

    $audio = $base64.base64_encode($file);

    $msg = "<audio id='m' src='".$audio."'></audio>\n<button id='btnAudio' class='btn btn-primary mt-3'><i class='fas fa-volume-high'></i></button>";

} else {
    $msg = "<h2>No se ingresaron datos. Por favor rellene el formulario</h2>";
}

?>

    <div class="vh-100">
        <?php echo $msg ?>
    </div>

    <script src="../JS/funciones.js"></script>
<?php 
include_once '../Estructura/footer.php';
?>