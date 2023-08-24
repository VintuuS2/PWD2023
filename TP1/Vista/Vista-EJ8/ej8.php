<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas cine</title>
    <style>
        body {
            display: flex;
            width: 100%;
            font-family:Arial, Helvetica, sans-serif;
        }
        div {
            width: 40%;
            margin: 5px auto;
            padding: 15px;
            background-color: #ddd;
            outline: dashed 1px black;
            text-align: center; 
            align-items: center;
        }
        h2 {
            display: block;
        }
    </style>
</head>
<body>
    <div>
        <h2>Calcular precio de entradas Cine cinem@s</h2>
        <form action="verPrecio.php" method="post">
            <label for="edad-usuario">Edad: </label><input type="number" name="edad-usuario" id="edad-usuario" required><br>
            <label for="estudiante-usuario">¿Sos estudiante? </label><br>
            Si<input type="radio" name="estudiante-usuario" value="si" checked><br>
            No<input type="radio" name="estudiante-usuario" value="no"><br>
            <input type="submit" style="float: left; margin-right: 10px">
            <button type="reset" style="float: left;">Reestablecer</button>
        </form>
    </div>
</body>
</html>