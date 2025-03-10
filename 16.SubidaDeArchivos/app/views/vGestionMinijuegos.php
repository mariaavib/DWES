<!-- vista que gestiona los minijuegos -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de minijuegos</title>
</head>
<body>
    <h2>Minijuegos</h2>
    <a href="mostrarFormAltas.php">Añadir Minijuego</a>
    <ul>
        <?php
            foreach($minijuegos as $minijuego){
                echo '<li>'.$minijuego['nombre'].'</li>';
                if (!empty($minijuego['imagen']) && file_exists($minijuego['imagen'])) {
                    echo '<img src="' . $minijuego['imagen'] . '" alt="Imagen del minijuego" style="width:100px; height:auto;">';
                } else {
                    // Si no hay imagen mostrar un mensaje 
                    echo '<p>No hay imagen disponible</p>';
                }
                // Enlace de modificar pasando el idMinijuego, nombre y la imagen
                echo '<a href="mostrarFormModif.php?idMinijuego='.$minijuego['idMinijuego'].'&nombre='.$minijuego['nombre'].'&imagen='.$minijuego['imagen'].'">Modificar</a>';
                echo '<br>';
                echo '<a href="eliminarMinijuego.php?idMinijuego='.$minijuego['idMinijuego'].'">Borrar</a>';
            }
        ?>
    </ul>
</body>
</html>