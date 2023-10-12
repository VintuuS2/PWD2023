<?php
include_once '../../TP4/configuracion.php';
include_once './Estructura/header.php';
require_once '../Util/vendor/autoload.php';

use Statickidz\GoogleTranslate;

$translator = new GoogleTranslate();

// Variables que contienen textos
$lang = isset($_COOKIE['selectedLanguage']) ? $_COOKIE['selectedLanguage'] : 'es';

$datos = data_submitted();

$labelTxt = [
    'es' => "Ingrese lo que quiera traducir",
    'en' => "Enter what you want to translate"
];

//$labelTxt['en'] = $translator->translate('es','en', 'Ingrese lo que quiera traducir');

$labelAreaPlaceHolder = [
    'es' => "Texto a traducir",
    'en' => "Text to translate"
];

$txtAreaErrorVacio = [
    'es' => "El campo no puede estar vacío",
    'en' => "The field cannot be empty"
];

$txtAreaErrorPatron = [
    'es' => "La traducción no admite carácteres especiales",
    'en' => "The translation does not support special characters"
];

$labelSrc = [
    'es' => "Idioma origen",
    'en' => "Source language"
];

$srcTxt = [
    'es' => "Traducir del",
    'en' => "Translate from"
];

$labelTgt = [
    'es' => "Idioma destino",
    'en' => "Destination language"
];

$tgtText = [
    'es' => "Traducir al",
    'en' => "Translate to"
];

$txtSubmit = [
    'es' => "Enviar",
    'en' => "Send"
];

$invalidFeedbackTxt = [
    'es' => "El campo no puede estar vacío",
    'en' => "The field cannot be empty"
];

$validFeedback = [
    'es' => "Parece estar bien!",
    'en' => "It seems fine!"
];

$invalidFeedbackLang = [
    'es' => "Seleccione un idioma",
    'en' => "Select a language"
];
?>

<div class="vh-100 d-flex justify-content-center">
    <div class="d-flex justify-content-center col-12 col-md-10 col-xl-8 h-100 bg-gris row align-items-start">
        <div class="col-12 d-flex mt-3">
            <label class="col-xl-10 col-md-10 col-8 d-flex justify-content-end mx-2" for="language-select"><img id="bandera-idioma" src="./../Imagenes/bandera-<?php echo isset($_COOKIE['selectedLanguage']) && $_COOKIE['selectedLanguage'] == 'en' ? 'gran-bretania.png' : 'argentina.png' ?>"></label>
            <select class="form-select " id="language-select">
                <?php
                if (isset($_COOKIE['selectedLanguage']) && $_COOKIE['selectedLanguage'] == 'en') {
                    echo '<label class="col-xl-10 col-md-10 col-8 d-flex justify-content-end" for="language-select"><img id="bandera-idioma" class="mx-2" src="./../Imagenes/bandera-gran-bretania.png"></label>
                    <option value="es">Español</option>
                    <option value="en" selected>English</option>';
                } else {
                    echo '<label class="col-xl-10 col-md-10 col-8 d-flex justify-content-end" for="language-select"><img id="bandera-idioma" class="mx-2" src="./../Imagenes/bandera-argentina.png"></label>
                    <option value="es" selected>Español</option>
                    <option value="en">English</option>';
                }
                ?>
            </select>
        </div>
        <div class="d-flex justify-content-center resultado">
            <?php
            if (isset($datos['txt']) && isset($datos['src']) && isset($datos['tgt'])) {
                $txt = $datos['txt'];
                $tgt = $datos['tgt'];
                $src = $datos['src'];

                $web = "http://translate.google.com/translate_tts";
                $base64 = "data:audio/wav;base64,";

                $translator = new GoogleTranslate();

                $translate = $translator->translate($src, $tgt, $txt);

                $url = $web . "?" . http_build_query([
                    'ie' => 'UTF-8',
                    'client' => 'gtx',
                    'q' => $translate,
                    'tl' => $tgt
                ]);

                $file = file_get_contents($url);

                $audio = $base64 . base64_encode($file);

                $msg = "<audio id='m' src='" . $audio . "'></audio>\n<button id='btnAudio' class='btn btn-primary mt-3'><i class='fas fa-volume-high'></i></button>";
                echo $msg;
            } else {
                echo "";
            }
            ?>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form" id="form" method="post" class="d-flex needs-validation row align-items-center col-10 col-md-8 col-xl-6 bg-black p-5 rounded" novalidate>
            <div class="form-group">
                <label for="txt" class="form-label mt-3 text-light"><?php echo $labelTxt[$lang] ?></label>
                <textarea rows="3" class="form-control" maxlength="200" required pattern="[a-z]+" name="txt" id="txt" placeholder="<?php echo $labelAreaPlaceHolder[$lang] ?>" errorVacio="<?php echo $txtAreaErrorVacio[$lang] ?>" errorPatron="<?php echo $txtAreaErrorPatron[$lang] ?>"></textarea> <!-- FALTA ARREGLAR EL PATTERN -->
                <div class="invalid-feedback">
                    <?php echo $invalidFeedbackTxt[$lang] ?>
                </div>
                <div class="valid-feedback">
                    <?php echo $validFeedback[$lang] ?>
                </div>
            </div>
            <div class="form-group col-12 col-md-5">
                <label for="src" class="form-label mt-3 text-light"><?php echo $labelSrc[$lang] ?></label>
                <select name="src" id="src" class="form-select" required>
                    <option value="" selected hidden><?php echo $srcTxt[$lang] ?></option>
                    <option value="en">English</option>
                    <option value="es">Español</option>
                    <option value="de">Deutsch</option>
                    <option value="zh">中国人</option>
                    <option value="ko">한국인</option>
                    <option value="fr">Français</option>
                    <option value="it">Italiano</option>
                    <option value="ja">日本語</option>
                    <option value="pt">Português</option>
                    <option value="ru">Русский</option>
                </select>
                <div class="invalid-feedback">
                    <?php echo $invalidFeedbackLang[$lang] ?>
                </div>
                <div class="valid-feedback">
                    <?php echo $validFeedback[$lang] ?>
                </div>
            </div>
            <div class="col-12 col-md-2 d-flex justify-content-center">
                <button type="button" id="btn-itercambiar-idiomas" class="btn btn-light mt-5 px-4"><i class="fa-solid fa-arrow-right-arrow-left"></i></button>
            </div>
            <div class="form-group col-12 col-md-5">
                <label for="tgt" class="form-label mt-3 text-light"><?php echo $labelTgt[$lang] ?></label>
                <select name="tgt" id="tgt" class="form-select" required>
                    <option value="" selected hidden><?php echo $tgtText[$lang] ?></option>
                    <option value="en">English</option>
                    <option value="es">Español</option>
                    <option value="de">Deutsch</option>
                    <option value="zh">中国人</option>
                    <option value="ko">한국인</option>
                    <option value="fr">Français</option>
                    <option value="it">Italiano</option>
                    <option value="ja">日本語</option>
                    <option value="pt">Português</option>
                    <option value="ru">Русский</option>
                </select>
                <div class="invalid-feedback">
                    <?php echo $invalidFeedbackLang[$lang] ?>
                </div>
                <div class="valid-feedback">
                    <?php echo $validFeedback[$lang] ?>
                </div>
            </div>
            <div class="form-group d-flex col-12 justify-content-center">
                <input type="submit" id="submit" class="btn btn-primary mt-3" value="<?php echo $txtSubmit[$lang] ?>">
            </div>
        </form>
    </div>
</div>
<script src="./JS/validador.js"></script>
<script src="./JS/funciones.js"></script>
<script>
    var resultado = $('.resultado');
    var form = $('#form');
    console.log(resultado.text().trim()); // Esto mostrará el contenido de texto en la consola
    if (resultado.text().trim() === '') {
        form.css("margin-top", "-400px");
    } else {
        form.css("margin-top", "20px");
    }
</script>
<?php
include_once './Estructura/footer.php';
?>