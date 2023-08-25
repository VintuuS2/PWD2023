<?php
include_once '../../../menu-paginas.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Ejercicio 4, TP2</title>
    <style>
        #contenedor {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .titulo {
            background-color: #ddd;
            margin-bottom: 20px;
            color: rgb(49, 126, 172)
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center" id="contenedor">
            <div class="col-md-12">
                <form class="formulario needs-validation row " id="formulario" method="post" action="../../Control/Control-EJ4/verDatos.php" novalidate>
                    <div class="titulo  pl-0 ">
                        <h5 class=" p-2">Cinem@s</h5>
                    </div>
                    <div class="col">
                        <!-- Título de la pelicula -->
                        <div class="formulario_grupo mb-3" id="grupo_titulo">
                            <label class="formulario_label form-label mb-0">Titulo</label>
                            <div class="formulario_grupo-input">
                                <input type="text" class="formulario_input form-control" id="titulo" name="titulo" placeholder="The Shawshank Redemption" required>
                            </div>
                        </div>
                        <!-- Director de la pelicula -->
                        <div class="formulario_grupo col-12 mb-3" id="grupo_director">
                            <label class="formulario_label form-label mb-0">Director</label>
                            <div class="formulario_grupo-input">
                                <input type="text" class="formulario_input form-control" id="director" name="director" placeholder="Frank Darabont" required>
                            </div>
                        </div>
                        <!-- Producción de la pelicula -->
                        <div class="formulario_grupo col-12 mb-3" id="grupo_produccion">
                            <label class="formulario_label form-label mb-0">Produccion</label>
                            <div class="formulario_grupo-input">
                                <input type="text" class="formulario_input form-control" id="produccion" name="produccion" required>
                            </div>
                        </div>
                        <!-- Nacionalidad de la pelicula -->
                        <div class="formulario_grupo col-12 mb-3" id="grupo_nacionalidad">
                            <label class="formulario_label form-label mb-0">Nacionalidad</label>
                            <div class="formulario_grupo-input">
                                <input type="text" class="formulario_input form-control" id="nacionalidad" name="nacionalidad" required>
                            </div>
                        </div>
                        <!-- Duración de la pelicula -->
                        <div class="formulario_grupo col-4 mb-3" id="grupo_duracion">
                            <label class="formulario_label form-label mb-0">Duración(minutos)</label>
                            <input type="number" class="formulario_input form-control" id="duracion" name="duracion" placeholder="120" max="999" min="1" required>
                            <div class="invalid-feedback">3 números como máximo</div>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Actores de la pelicula -->
                        <div class="formulario_grupo col-12 mb-3" id="grupo_actores">
                            <label class="formulario_label form-label mb-0">Actores</label>
                            <div class="formulario_grupo-input">
                                <input type="text" class="formulario_input form-control" id="actores" placeholder="Morgan Freeman, Tim Robbins..." name="actores" required>
                            </div>
                        </div>
                        <!-- Guion de la pelicula -->
                        <div class="formulario_grupo col-12 mb-3" id="grupo_guion">
                            <label class="formulario_label form-label mb-0">Guion</label>
                            <div class="formulario_grupo-input">
                                <input type="text" class="formulario_input form-control" id="guion" name="guion" required>
                            </div>
                        </div>
                        <!-- Año de la pelicula -->
                        <div class="formulario_grupo col-3 mb-3" id="grupo_anio">
                            <label class="formulario_label form-label mb-0">Año</label>
                            <div class="formulario_grupo-input">
                                <input type="number" class="form-control formulario_input" id="anio" pattern="[0-9]+" max="9999" min="1" name="anio" required>
                                <div class="invalid-feedback">Solo 4 digitos!</div>
                            </div>
                        </div>
                        <!-- Genero de la pelicula -->
                        <div class="formulario_grupo col-3 mb-3" id="grupo_genero">
                            <label class="formulario_label form-label mb-0">Genero</label>
                            <div class="formulario_grupo-input">
                                <select id="genero" name="genero" class="formulario_input form-select" required>
                                    <option selected disabled value="">Elegir</option>
                                    <option>Acción</option>
                                    <option>Aventura</option>
                                    <option>Ciencia Ficción</option>
                                    <option>Comedia</option>
                                    <option>Drama</option>
                                    <option>Fantasía</option>
                                    <option>Suspenso</option>
                                    <option>Terror</option>
                                </select>
                            </div>
                        </div>
                        <!-- Restricción de edad de la pelicula -->
                        <div class="formulario_grupo mb-3" id="grupo_edad">
                            <label class="formulario_label mb-2">Restricciones de edad</label>
                            <div class="formulario_grupo-input">
                                <input type="radio" name="edad" id="todolospublicos" value="Todo los publicos" class="formulario_input form-check-input" required><label class="formulario_label etiqueta form-check-label"> Todos los publicos</label>
                                <input type="radio" name="edad" id="mayores7" value="Mayores a 7 años" class="formulario_input form-check-input" required><label class="formulario_label form-check-label"> Mayores a 7 años</label>
                                <input type="radio" name="edad" id="mayores18" value="Mayores a 18 años" class="formulario_input form-check-input" required><label class="formulario_label form-check-label"> Mayores a 18 años</label>

                                <div class="invalid-feedback">Se debe ingresar el rango de edad</div>
                            </div>
                        </div>
                    </div>
                    <!-- Sinopsis de la pelicula -->
                    <div class="row">
                        <div class="formulario_grupo mb-3" id="sinopsis">
                            <label class="formulario_label form-label">Sinopsis</label>
                            <div clas="formulario_grupo-input">
                                <textarea class="formulario_input form-control" id="sinopsis" rows="3" name="sinopsis" required></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Botones de enviar y borrar -->
                    <div class="row justify-content-center pb-3 align-items-center" id="div-botones">
                        <div style="float: right; ">
                            <div class="formulario_grupo formulario_grupo-btn-enviar  justify-content-between" style="float: right;">
                                <button type="reset" class="formulario_btn btn btn-secondary" style="float: right;">Borrar</button>
                                <button type="submit" class="formulario_btn btn btn-primary" value="Enviar" style="float: right; margin-right:10px;">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>