<!-- Vista para modificar un ambito -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Ambito</title>
</head>
<body>
    <h2>Modificar Ambito</h2>
    <form action="modificar_ambito.php" method="POST">
        <input type="hidden" name="idambito" value="<?php echo $ambito['idambito']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $ambito['nombre']; ?>">
        <input type="submit" value="Guardar">
    </form>
</body>
</html>