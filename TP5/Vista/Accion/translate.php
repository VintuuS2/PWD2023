<?php
include_once '../../../TP4/configuracion.php';
include_once '../Estructura/header.php';
require_once '../../Util/vendor/autoload.php';
require_once '../../Util/voicerss_tts.php';

$datos = data_submitted();

use Statickidz\GoogleTranslate;

if (isset($datos['txt']) && isset($datos['src']) && isset($datos['tgt'])) {
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
    case 'zh':
        $idioma2 = "-cn";
        $voice = "Luli";
        break;
    case 'fr':
        $idioma2 = "-fr";
        $voice = "Theo";
        break;
    case 'de':
        $idioma2 = "-de";
        $voice = "Hanna";
        break;
    case 'it':
        $idioma2 = "-it";
        $voice = "Bria";
        break;
    case 'ja':
        $idioma2 = "-jp";
        $voice = "Hina";
        break;
    case 'ko':
        $idioma2 = "-kr";
        $voice = "Nari";
        break;
    case 'ru':
        $idioma2 = "-ru";
        $voice = "Olga";
        break;
    default:
        $idioma2 = "-us";
        $voice = "Amy";
        break;
}

$lang = $tgt . $idioma2;

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

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="p-3 bg-light w-50">
        <div class="text-center">
            <p class=""><?php echo "<h2>El texto traducido es: </h2>" . "<br>" . ". <h3>".$translate?></h3></p>
        </div>
        <div class="text-center">
        <audio hidden id="m" src="<?php echo $voice['response'] ?>" controls=""></audio>
            <button id="btnAudio" class="btn btn-primary mt-3"><i class="fas fa-volume-high"></i></button>
        </div>
        <a class="btn btn-primary mt-3" role="button" href="../Index.php">Volver</a>
    </div>
</div>



<script src="../JS/validador.js"></script>
<?php
include_once '../Estructura/footer.php';
?>