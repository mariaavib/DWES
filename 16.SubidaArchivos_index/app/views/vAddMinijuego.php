<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Añadir Minijuego</title>
</head>
<body>
    <form action="index.php?c=Minijuegos&m=addMinijuego" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <label for="ambito">Ambito: </label>
        <select name="idAmbito" id="idAmbito">
            <?php
                foreach ($datos as $indice => $ambito) {
                    echo '<option value="'.$ambito['idAmbito'].'">'.$ambito['nombre'].'</option>';
                }
            ?>
        </select><br>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen"><br>
        <input type="submit" value="Enviar">
        <a href="index.php">Volver</a>
    </form>
</body>
</html>