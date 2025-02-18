<?php
    require_once('conexion.php');
    require_once('extraerAmbitos copy.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambitos</title>
</head>
<body>
    <h1>Selecciona los ambitos para mostrar los minijuegos</h1>
    <form action="" method="post">
        <?php
            foreach ($ambitos as $indice => $valor) {
                echo '<input type="checkbox" name="ambitos[]" value='".$valor["idAmbito"]."'>'.$valor["nombre"].'<br>';
            }            
        ?>
    </form>
</body>
</html>