<?php

include_once '../../../TP4/configuracion.php';
include_once '../Estructura/header.php';
require_once '../../Util/vendor/autoload.php';

$datos = data_submitted();
$base64 = "data:audio/wav;base64,";


use Statickidz\GoogleTranslate;

if (isset($datos['txt']) && isset($datos['src']) && isset($datos['tgt'])) {
    $src = $datos['src'];
    $tgt = $datos['tgt'];
    $txt = $datos['txt'];
    $translator = new GoogleTranslate();

    $translate = $translator->translate($src, $tgt, $txt);
}

use duncan3dc\Speaker\TextToSpeech;
use duncan3dc\Speaker\Providers\GoogleProvider;

$provider = new GoogleProvider($tgt);

$tts = new TextToSpeech($translate, $provider);
$audioEncoded = base64_encode($tts->getAudioData());
$output = $base64.$audioEncoded;

echo "<audio id='m' src='".$output."'></audio>";

echo $output;

?>

    <div class="vh-100">
        <button id="btnAudio" class="btn btn-primary mt-3"><i class="fas fa-volume-high"></i></button>
    </div>

    <script src="../JS/funciones.js"></script>

<?php 
include_once '../Estructura/footer.php';
?>

