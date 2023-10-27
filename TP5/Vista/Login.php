<?php
$tituloPagina = "TP5-Login";
include_once "../../configuracionProyecto.php";
include_once "../../TP5/Vista/Estructura/header.php";
?>
<div class="d-flex justify-content-center align-items-center  vh-100">
    <div class="d-flex justify-content-center bg-gris row col-12 col-md-10  row position-relative h-100 align-items-center">
    <div class="bg-black p-5 rounded-5 text-white col-8 col-md-5 col-xl-3">
    <form action="">
        <div class="text-center"><h2>Login</h2></div>
        <div class="form-group">
            <label for="InputUser">Nombre de Usuario</label>
            <input type="email" class="form-control" name="InputUser" id="InputUser" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="InputPassword">Contraseña</label>
            <input type="password" class="form-control" id="InputPassword" placeholder="Password">
        </div>
        <br>
        <div class="text-center">
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </div>    
    </form>
    </div>
    </div>
</div>
<?php
include_once "../../vista/estructura/footer.php";
?>