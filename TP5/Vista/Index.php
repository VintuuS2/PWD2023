<?php
include_once '../../TP4/configuracion.php';
include_once './Estructura/header.php';
require_once '../Util/vendor/autoload.php';

use Statickidz\GoogleTranslate;
$translator = new GoogleTranslate();

// Variables que contienen textos
$labelTxt = "Ingrese lo que quiera traducir";
$labelTxtEN = $translator->translate("es", "en", $labelTxt);

$txtAreaPlaceholder = "Texto a traducir";
$txtAreaPlaceholderEN = $translator->translate("es", "en", $txtAreaPlaceholder);

$txtAreaErrorVacio = "El campo no puede estar vacío";
$txtAreaErrorVacioEN = $translator->translate("es", "en", $txtAreaErrorVacio);

$txtAreaErrorPatron = "La traducción no admite carácteres especiales";
$txtAreaErrorPatronEN = $translator->translate("es", "en", $txtAreaErrorPatron);

$labelSrc = "Idioma origen";
$labelSrcEN = $translator->translate("es", "en", $labelSrc);

$srcText = "Traducir del";
$srcTextEN = $translator->translate("es", "en", $srcText);

$labeltgt = "Idioma destino";
$labeltgtEN = $translator->translate("es", "en", $labeltgt);

$tgtText = "Traducir al";
$tgtTextEN = $translator->translate("es", "en", $tgtText);

$txtSubmit = "Enviar";
$txtSubmitEN = "Send"; // no se usa el '$translator->translate' para no hacer muchas request

$invalidFeedbackTxt = "El campo no puede estar vacío";
$invalidFeedbackTxtEN = "The field cannot be empty"; // no se usa el '$translator->translate' para no hacer muchas request

$validFeedback = "Parece estar bien!";
$validFeedbackEN = "It seems fine!"; // no se usa el '$translator->translate' para no hacer muchas request

$invalidFeedbackLang = "Seleccione un idioma";
$invalidFeedbackLangEN = "Select a language"; // no se usa el '$translator->translate' para no hacer muchas request
?>

<div class="vh-100 d-flex justify-content-center">
    <div class="d-flex justify-content-center col-12 col-md-10 col-xl-8 h-100 bg-gris row align-items-start">
        <div class="col-12 d-flex mt-3">
            <label class="col-xl-10 col-md-10 col-8 d-flex justify-content-end" for="language-select"><img id="bandera-idioma" class="mx-2" src="./../Imagenes/bandera-argentina.png"></label>
            <select class="form-select " id="language-select">
                <option value="es" selected>Español</option>
                <option value="en">English</option>
            </select>
        </div>
        <form action="./Accion/translate.php" name="form" id="form" method="post" class="d-flex needs-validation row align-items-center col-10 col-md-8 col-xl-6 bg-black p-5 rounded" novalidate>
            <div class="form-group">
                <label for="txt" class="form-label mt-3 text-light" id="labelTxt">Ingrese lo que quiera traducir</label>
                <textarea rows="3" class="form-control" maxlength="200" required pattern="[a-z]+" name="txt" id="txt" placeholder="Texto a traducir" errorVacio="El campo no puede estar vacío" errorPatron="La traducción no admite carácteres especiales"></textarea> <!-- FALTA ARREGLAR EL PATTERN -->
                <div class="invalid-feedback" id="invalidFeedbackTxt">
                    El campo no puede estar vacío
                </div>
                <div class="valid-feedback" id="validFeedbackTxt">
                    Parece estar bien!
                </div>
            </div>
            <div class="form-group col-12 col-md-5">
                <label for="src" class="form-label mt-3 text-light" id="labelSrc">Idioma origen</label>
                <select name="src" id="src" class="form-select" required>
                    <option value="" selected hidden id="srcText">Traducir del</option>
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
                <div class="invalid-feedback" id="invalidFeedbackSRC">
                    Seleccione un idioma
                </div>
                <div class="valid-feedback" id="validFeedbackSRC">
                    Parece estar bien!
                </div>
            </div>
            <div class="col-12 col-md-2 d-flex justify-content-center">
                <button type="button" id="btn-itercambiar-idiomas" class="btn btn-light mt-5 px-4"><i class="fa-solid fa-arrow-right-arrow-left"></i></button>
            </div>
            <div class="form-group col-12 col-md-5">
                <label for="tgt" class="form-label mt-3 text-light" id="labelTgt">Idioma destino</label>
                <select name="tgt" id="tgt" class="form-select" required>
                    <option value="" selected hidden id="tgtText">Traducir al</option>
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
                <div class="invalid-feedback" id="invalidFeedbackTGT">
                    Seleccione un idioma
                </div>
                <div class="valid-feedback" id="validFeedbackTGT">
                    Parece estar bien!
                </div>
            </div>
            <div class="form-group d-flex col-12 justify-content-center">
                <input type="submit" id="submit" class="btn btn-primary mt-3" value="Enviar">
            </div>
        </form>
    </div>
</div>
<script src="./JS/validador.js"></script>
<script src="./JS/funciones.js"></script>
<script>
    // Este script tiene que estar tiene que estar si o si en este archivo index porque si esta aparte los mensajes se muestran mal
    var select = $('#language-select');
    var labelTxt = $('#labelTxt');
    var txtArea = $('#txt');
    var labelSrc = $('#labelSrc');
    var srcText = $('#srcText');
    var labelTgt = $('#labelTgt');
    var tgtText = $('#tgtText');
    var submit = $('#submit');
    var bandera = $('#bandera-idioma');
    var invalidFeedbackTxt = $('#invalidFeedbackTxt');
    var validFeedbackTxt = $('#validFeedbackTxt');
    var invalidFeedbackSRC = $('#invalidFeedbackSRC');
    var validFeedbackSRC = $('#validFeedbackSRC');
    var invalidFeedbackTGT = $('#invalidFeedbackTGT');
    var validFeedbackTGT = $('#validFeedbackTGT');
    
    select.on('change', function() {
        var selectedLanguage = select.val();
        if (selectedLanguage === 'es') {
            labelTxt.text("<?php echo $labelTxt; ?>");
            txtArea.attr("placeholder" , "<?php echo $txtAreaPlaceholder; ?>");
            txtArea.attr("errorVacio" , "<?php echo $txtAreaErrorVacio; ?>");
            txtArea.attr("errorPatron" , "<?php echo $txtAreaErrorPatron; ?>");
            labelSrc.text("<?php echo $labelSrc; ?>");
            srcText.text("<?php echo $srcText; ?>");
            labelTgt.text("<?php echo $labeltgt; ?>");
            tgtText.text("<?php echo $tgtText; ?>");
            submit.attr("value" , "<?php echo $txtSubmit; ?>");
            bandera.attr("src" , "./../Imagenes/bandera-argentina.png");
            invalidFeedbackTxt.text("<?php echo $invalidFeedbackTxt; ?>");
            validFeedbackTxt.text("<?php echo $validFeedback; ?>");
            invalidFeedbackSRC.text("<?php echo $invalidFeedbackLang; ?>");
            validFeedbackSRC.text("<?php echo $validFeedback; ?>");
            invalidFeedbackTGT.text("<?php echo $invalidFeedbackLang; ?>");
            validFeedbackTGT.text("<?php echo $validFeedback; ?>");
        } else {
            labelTxt.text("<?php echo $labelTxtEN; ?>");
            txtArea.attr("placeholder" , "<?php echo $txtAreaPlaceholderEN; ?>");
            txtArea.attr("errorVacio" , "<?php echo $txtAreaErrorVacioEN; ?>");
            txtArea.attr("errorPatron" , "<?php echo $txtAreaErrorPatronEN; ?>");
            labelSrc.text("<?php echo $labelSrcEN; ?>");
            srcText.text("<?php echo $srcTextEN; ?>");
            labelTgt.text("<?php echo $labeltgtEN; ?>");
            tgtText.text("<?php echo $tgtTextEN; ?>");
            submit.attr("value" , "<?php echo $txtSubmitEN; ?>");
            bandera.attr("src" , "./../Imagenes/bandera-gran-bretania.png");
            invalidFeedbackTxt.text("<?php echo $invalidFeedbackTxtEN; ?>");
            validFeedbackTxt.text("<?php echo $validFeedbackEN; ?>");
            invalidFeedbackSRC.text("<?php echo $invalidFeedbackLangEN; ?>");
            validFeedbackSRC.text("<?php echo $validFeedbackEN; ?>");
            invalidFeedbackTGT.text("<?php echo $invalidFeedbackLangEN; ?>");
            validFeedbackTGT.text("<?php echo $validFeedbackEN; ?>");
        }
    });
</script>
<?php
include_once './Estructura/footer.php';
?>