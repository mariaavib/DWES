<?php
    require_once("./subir_imagen.php");
    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }
    $objSubirImg = new SubirImg($mysqli);
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
        //echo '<img src="../'.$objSubirImg->eleccionEscenario().'"alt="Escenario 1">';
        echo '<a href="'.$objSubirImg->verImagen($objSubirImg->eleccionEscenario()).'>"Educacion"</a>';
    ?>
   <!-- <button>Escenario 2</button>
   <button>Escenario 3</button> -->
</body>
</html>