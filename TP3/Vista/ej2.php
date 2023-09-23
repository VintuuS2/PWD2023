<?php
include_once '../../TP4/configuracion.php';
include_once './estructura/header.php';
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <div class="d-flex align-items-center py-4 bg-body-tertiary">
                <main class="form-signin w-100 m-auto">
                    <div class="container-centered">
                        <form action="./accion/a_suba_txt.php" method="post" enctype="multipart/form-data">
                            <div class="container d-flex justify-content-center">
                                <div class="bg-secondary m-4  d-flex justify-content-center align-items-center" style="height: 300px; width: 500px;">
                                    <div class="bg-light position-relative " style="height: 270px; width: 470px;">
                                        <div class="d-grid gap-2 col-10 mx-auto position-absolute top-50 start-50 translate-middle">
                                            <div class="form-floating mb-2">
                                                Seleccionar archivo TXT: <input type="file" name="archivo" id="archivo">
                                            </div>
                                            <div id="formconsole" class="error"></div>
                                            <input type="submit" value="Subir Archivo" id="boton" class="btn btn-primary " style="background-color: rgb(0,206,129);border-color: rgb(0,206,129)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>
    </div>

<?php include_once './estructura/footer.php'; ?>