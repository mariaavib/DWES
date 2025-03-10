<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minijuego Seleccionado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="mostrarMinijuego">
        <?php
            echo "<h2>".$_GET["nombre"]."</h2><br>";
            echo "<p id='url'>URL </p><br>";
            echo "<a href=".$_GET["url"].">".$_GET["url"]."</a><br>";
        ?> 
        <a href="index.php" id="volver">VOLVER</a>
    </div>
</body>
</html>


