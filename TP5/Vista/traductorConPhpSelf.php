<?php
$tituloPagina = "TP5-Traductor con PHP_SELF";
include_once '../../configuracionProyecto.php';
include_once '../Util/funciones.php';
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

$translation = [
    'es' => "Traducción",
    'en' => "Translation"
];

?>

<div class="vh-100 d-flex justify-content-center">
    <div class="d-flex justify-content-center bg-gris col-12 col-md-10 col-xl-8 h-100 row align-items-start position-relative">
        <div class="position-absolute end-0 mt-3 w-25">
            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"><img id="bandera-idioma" src="./Imagenes/bandera-<?php echo isset($_COOKIE['selectedLanguage']) && $_COOKIE['selectedLanguage'] == 'en' ? 'gran-bretania.png' : 'argentina.png' ?>"></label>
                </div>
                <select class="form-select" id="language-select">
                    <?php
                    if (isset($_COOKIE['selectedLanguage']) && $_COOKIE['selectedLanguage'] == 'en') {
                        echo '<option value="es">Español</option>
                        <option value="en" selected>English</option>';
                    } else {
                        echo '<option value="es" selected>Español</option>
                        <option value="en">English</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="pt-5 res1 mt-5 justify-content-center d-flex">
            <div class="d-flex justify-content-center col-10 col-md-8 col-xl-6 resultado">
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
                    $audioOutput = "<audio id='m' src='" . $audio . "'></audio>\n<button id='btnAudio' class='btn btn-primary mt-3'><i class='fas fa-volume-high'></i></button>";
                    $resultado = '<div class="modal-dialog" role="document">
                        <div class="modal-content rounded-4 shadow bg-black">
                            <div class="end-0">
                                <button id="borrar" type="button" class="btn mt-1 w-25 float-end"><i class="fa-solid fa-xmark text-light"></i></button>
                            </div>
                            <div class="modal-body pt-4 p-5">
                                <h2 class="text-light fw-bold mb-0">' . $translation[$lang] . ':</h2>
                                <ul class="d-grid gap-2 my-5 list-unstyled small">
                                    <li class="text-center">
                                        <p class="text-light">' . $translate . '</p>
                                    </li>
                                    <li class="text-center">' .
                        $audioOutput .
                        '</li>
                                </ul>
                            </div>
                        </div>
                    </div>';
                    echo $resultado;
                }
                ?>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="mb-5 d-flex justify-content-center">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name="form" id="form" method="post" class="form-php-self d-flex needs-validation row align-items-center col-10 col-md-8 col-xl-6 bg-black p-5 rounded-5" novalidate>
                <div class="form-group">
                    <label for="txt" class="form-label mt-3 text-light"><?php echo $labelTxt[$lang] ?></label>
                    <textarea rows="3" class="form-control" maxlength="200" required name="txt" id="txt" placeholder="<?php echo $labelAreaPlaceHolder[$lang] ?>" errorVacio="<?php echo $txtAreaErrorVacio[$lang] ?>" errorPatron="<?php echo $txtAreaErrorPatron[$lang] ?>"></textarea> 
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
                    <div class="loader-container" id="loader-container">
                        <div class="loader"></div>
                        <div class="loader2"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./JS/validador.js"></script>
<script src="./JS/funciones.js"></script>
<?php
include_once './../../vista/estructura/footer.php';
?>