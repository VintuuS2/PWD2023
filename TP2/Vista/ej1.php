<?php
$tituloPagina = "TP2-Ejercicio 1";
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
?>
    <div class="contenedor vh-100 w-100">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <h2>Decidimos usar JQuery como framework de JS después de investigación de otros frameworks</h2>
            <h3>Ejercicio 1: Investigue y pruebe la validación de formularios usando alguna librería o framework javaScript (JQuery, Mootools, Dojo, Prototype, etc).</h3>
            <br><br>
            <h5>Ejemplo:</h5>
            <form>
                <label class="form-label" for="name">Nombre:</label>
                <input class="form-control" type="text" id="name" name="name">
                <br>
                <label class="form-label" for="email">Correo electrónico:</label>
                <input class="form-control" type="email" id="email" name="email">
                <br>
                <button class="btn btn-primary mt-3" type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <script src="./js/ej1.js"></script>
<?php include_once './../../vista/estructura/footer.php'; ?>