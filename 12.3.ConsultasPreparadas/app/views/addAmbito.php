<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="index.php?c=Recoger&m=add"  method="post">
    <?php
        //Verifica si $datos es un array y si contiene errores
        if (is_array($datos) && isset($datos['errores'])) {
            echo '<div class="errores"><ul>';
            // Recorre cada error y lo muestra 
            foreach ($datos['errores'] as $error) {
                echo '<p class="error">'.$error.'</p>';
            }
            echo '</ul></div>';
        } else {
            // Verifica si $datos es true 
            if ($datos === true) {
                echo 'Insertado correctamente';
            } elseif (is_numeric($datos) && $datos > 0) {  
                //Asegurar que $datos es un número is_numeric comprueba si una variable es un número o un string numérico
                for ($i = 0; $i < $datos; $i++) {
                    echo '<label for="nombAmbito">Nombre del Ámbito:</label>';
                    echo '<input type="text" name="nombAmbito[]">';
                    echo '<br>';
                }
            }
        }
    ?>
    <input type="submit">
    </form>
    <a href="index.php" class="boton-volver">VOLVER</a>
</body>
</html>