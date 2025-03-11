<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestion de minijuegos</title>
</head>
<body>
    <h2>Minijuegos</h2>
    <a href="index.php?c=Minijuegos&m=formMinijuego">Añadir Minijuego</a>
    <ul>
        <?php
            foreach ($datos as $indice => $valor) {
                echo '<li>'.$valor['nombre'].'</li>';
                echo '<a href="index.php?c=Minijuegos&m=formModificar&id='.$valor['idMinijuego'].'&nombre='.$valor['nombre'].'&imagen='.$valor['imagen'].'">Modificar</a>';
                // echo '<a href="">Eliminar</a>';
            }
        ?>
    </ul>
</body>
</html>