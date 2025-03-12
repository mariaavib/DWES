<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minijuegos</title>
</head>
<body>
    <ul>
        <?php
            foreach($minijuegos as $minijuego){
                echo '<li>'.$minijuego['nombre'].'</li>';
                echo '<a href="mostrarFormModif.php?id='.$minijuego['idMinijuego'].'">Modificar</a>';
            }
        ?>
    </ul>
</body>
</html>