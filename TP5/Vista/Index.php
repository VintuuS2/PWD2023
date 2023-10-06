<?php
include_once '../../TP4/configuracion.php';
include_once './Estructura/header.php';
?>

    <div class="vh-100 d-flex justify-content-center">
        <div class="d-flex justify-content-center align-items-center h-100 bg-gris">
            <form action="./Accion/translate.php" name="form" id="form" method="post" class="d-flex needs-validation row align-items-center col-md-6 bg-black p-5 rounded" novalidate>
                <div class="form-group">
                    <label for="txt" class="form-label mt-3 text-light">Ingrese lo que quiera traducir</label>
                    <input type="text" class="form-control" maxlength="100" required pattern="[a-zA-ZñÑ0-9 ¡!¿?]+" name="txt" id="txt" placeholder="Ingrese una palabra a traducir" errorVacio="El campo no puede estar vacío" errorPatron="La traducción no admite carácteres especiales">
                    <div class="invalid-feedback">
                        El campo no puede estar vacío
                    </div>
                    <div class="valid-feedback">
                        Se ve bien!
                    </div>
                </div>
                <div class="form-group">
                    <label for="src" class="form-label mt-3 text-light">Idioma origen</label>
                    <select name="src" id="src" class="form-select" required>
                        <option value="" selected hidden>Traducir del</option>
                        <option value="en">Inglés</option>
                        <option value="es">Español</option>
                        <option value="de">Alemán</option>
                        <option value="zh">Chino</option>
                        <option value="ko">Coreano</option>
                        <option value="fr">Francés</option>
                        <option value="it">Italiano</option>
                        <option value="ja">Japonés</option>
                        <option value="pt">Portugués</option>
                        <option value="ru">Ruso</option>
                    </select>
                    <div class="invalid-feedback">
                        Ingrese un idioma
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgt" class="form-label mt-3 text-light">Idioma destino</label>
                    <select name="tgt" id="tgt" class="form-select" required>
                        <option value="" selected hidden>Traducir al</option>
                        <option value="en">Inglés</option>
                        <option value="es">Español</option>
                        <option value="de">Alemán</option>
                        <option value="zh">Chino</option>
                        <option value="ko">Coreano</option>
                        <option value="fr">Francés</option>
                        <option value="it">Italiano</option>
                        <option value="ja">Japonés</option>
                        <option value="pt">Portugués</option>
                        <option value="ru">Ruso</option>
                    </select>
                    <div class="invalid-feedback">
                        Ingrese un idioma
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary mt-3" value="Tonto wn">
                </div>
            </form>
        </div>
    </div>
    <script src="./JS/validador.js"></script>

<?php
include_once './Estructura/footer.php';
?>