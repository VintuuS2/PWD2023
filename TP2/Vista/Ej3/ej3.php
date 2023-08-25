<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                var usuario = $("#usuario").val();
                var contra = $("#contra").val();

                if (usuario.trim() === "" || contra.trim() === "") {
                    alert("Por favor, completa todos los campos.");
                    event.preventDefault(); // Evita el envío del formulario
                }

                if (contra.length < 8) {
                    alert("La contraseña debe tener al menos 8 caracteres.");
                    event.preventDefault();
                }

                if (contra === usuario) {
                    alert("La contraseña no puede ser igual al nombre de usuario.");
                    event.preventDefault();
                }

                var letrasNumeros = /^[0-9a-zA-ZñÑ]+$/;
                if (!contra.match(letrasNumeros)) {
                    alert("La contraseña debe contener letras, números y la letra 'ñ' solamente.");
                    event.preventDefault();
                }
            });
        });
    </script>
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <div class="container-centered">
            <form action="../../Vista/Ej3/Accion/a_alta_usuario.php" method="post" id="form">
                <div class="container d-flex justify-content-center">
                    <div class="bg-secondary m-4  d-flex justify-content-center align-items-center" style="height: 300px; width: 300px;">
                        <div class="bg-light position-relative " style="height: 270px; width: 270px;">
                            <div class="d-grid gap-2 col-10 mx-auto position-absolute top-50 start-50 translate-middle">
                                <p class="h5 text-center">Member Login</p>

                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Username">

                                    <label for="usuario" id="mensaje1"><i class="bi bi-person-fill"></i> <i class="fa-solid fa-user"></i>Username</label>

                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="contra" name="contra" placeholder="Password">
                                    <label for="pass"><i class="bi bi-lock-fill"></i><i class="fa-solid fa-lock"></i> Password</label>

                                </div>
                                <div id="formconsole" class="error"></div>
                                <input type="submit" value="Login" id="boton" class="btn btn-primary " style="background-color: rgb(0,206,129);border-color: rgb(0,206,129)">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>