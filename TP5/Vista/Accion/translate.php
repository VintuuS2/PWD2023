<?php
include_once '../../../TP4/configuracion.php';
include_once '../Estructura/header.php';
require_once '../../Util/vendor/autoload.php';
require_once '../../Util/voicerss_tts.php';

$datos = data_submitted();
use Statickidz\GoogleTranslate;

if (isset($datos['txt']) && isset($datos['src']) && isset($datos['tgt'])){
    $src = $datos['src'];
    $tgt = $datos['tgt'];
    $txt = $datos['txt'];
    $translator = new GoogleTranslate();

    $translate = $translator->translate($src, $tgt, $txt);
}

$idioma2 = "";
$voice = "";

switch ($tgt) {
    case 'es':
        $idioma2 = "-mx";
        $voice = "Silvia";
        break;
    case 'en':
        $idioma2 = "-us";
        $voice = "Amy";
        break;
    case 'pt':
        $idioma2 = "-br";
        $voice = "Ligia";
        break;
}

$lang = $tgt.$idioma2;

$tts = new VoiceRSS();
$voice = $tts->speech([
    'key' => 'b875fd709c4742658205504e656009b7',
    'hl' => $lang,
    'v' => $voice,
    'src' => $translate,
    'r' => '0',
    'c' => 'wav',
    'f' => '48khz_16bit_stereo',
    'ssml' => 'false',
    'b64' => 'true'
]);
?>

    <div class="w-100 vh-100 row justify-content-center">
        <div class="d-flex bg-gris w-50 vh-100 justify-content-center align-items-center">
            <p> <?php echo $translate?> </p>
            <audio hidden id="m" src="<?php echo $voice['response'] ?>" controls=""></audio>
            <br>
            <label class="form-label" for="m">Escuchar</label>
            <button id="btnAudio" class="btn btn-primary t-2"><i class="fa-solid fa-volume-high"></i></button>
        </div>
    </div>

    <script src="../JS/validador.js"></script>
<?php
include_once '../Estructura/footer.php';
?>