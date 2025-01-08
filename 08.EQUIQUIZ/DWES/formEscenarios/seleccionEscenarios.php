<?php
    require_once("./config_db.php");
    require_once("./subir_imagen.php");
    require_once("./verImagen.php");

    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    $objSubirImg = new SubirImg($mysqli);
    $objVerImg = new verImg();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escenarios</title>
</head>
<body>
    <?php
        $rutaImagen = $objSubirImg->eleccionEscenario();
        
        if ($rutaImagen) {
            echo '<a href="./visualizarFondo.php?rutaFondo=../' . $rutaImagen . '">Educacion</a>';
        } else {
            echo "No se encontró la imagen.";
        }

    ?>
   <a>Laboral</a>
   <a>Salud</a>
   
</body>
</html>