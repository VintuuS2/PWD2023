<?php
$titulo = "TP-FINAL Listar usuarios del Administrador";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "./../Estructura/header.php";
include_once "./../Estructura/ultimoNav.php";
?>

<div class="container-fluid bg-tertiary h-100">
    <div class="row justify-content-center align-items-center h-100">
        <form class="w-75 p-5 rounded-3 bg-body-tertiary" action="./../Accion/aniadirRol.php">
            <div class="text-center mb-4">
                <h2>Añadir Rol</h2>
            </div>
            <div class="mb-3">
                <label for="rodescripcion" class="form-label">Nombre del Rol a añadir</label>
                <input type="text" class="form-control" id="rodescripcion" name="rodescripcion" placeholder="Administrador/deposito/cliente">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-secondary">Enviar</button>
            </div>
        </form>
    </div>
</div>

<script src="JS/funciones.js"></script>
<?php
include_once "../../../vista/estructura/footer.php";

?>