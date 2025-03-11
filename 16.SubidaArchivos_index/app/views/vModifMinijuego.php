<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modificar Minijuego</title>
</head>
<body>
    <form action="modificarMinijuego.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value=""><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen"><br>
        <!-- Mostrar la imagen actual -->
        <input type="submit" value="Modificar">
        <a href="index.php">Volver</a>
    </form>
</body>
</html>