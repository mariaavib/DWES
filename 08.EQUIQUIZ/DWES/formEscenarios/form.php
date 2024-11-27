<?php
    require_once("./subir_imagen.php");
    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }
    $objSubirImg = new SubirImg($mysqli);
    $objSubirImg->subirImagenes();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escenarios</title>
</head>
<body>
    <!-- Formulario para subir imagenes y que se guarden en la base de datos -->
    <form action="subir_imagen.php" method="post" enctype="multipart/form-data">
        <label for="ambito">Ámbito:</label>
        <input type="text" name="ambito" id="ambito"><br><br>
        <label for="imagen">Seleccionar imagen:</label>
        <input type="file" name="imagen" id="imagen"><br><br>
        <input type="submit" value="Subir Imagen">
    </form>
</body>
</html>