<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="index.php?c=Usuario&m=inicioSesion" method="post">
        <label for="correo">Usuario: </label>
        <input type="text" name="correo">
        <label for="nombre">Contraseña: </label>
        <input type="password" name="passw">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>