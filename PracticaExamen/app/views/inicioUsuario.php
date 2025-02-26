<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
</head>
<body>
    <h1>Has iniciado sesion <?php echo $objControlador->nombre; ?></h1>
    <p>El correo es <?php echo $_SESSION['correo']; ?></p>
    <a href="index.php?c=Usuario&m=vistaPassw">Cambiar contraseña</a>
    <a href="">Modificar contraseña</a>
    <a href="">Cerrar sesion</a>
</body>
</html>