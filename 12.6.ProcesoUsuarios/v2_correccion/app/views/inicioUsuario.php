<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Perfil del usuario</title>
</head>
<body>
    <h1>Has iniciado sesión <?php echo $_SESSION['nombre']; ?></h1>
    <p>Correo: <?php echo $_SESSION['correo']; ?></p>
    <p>Teléfono: <?php echo $_SESSION['telefono']; ?></p>
    <a href="index.php?c=Usuarios&m=vistaPassw">🔒Cambiar Contraseña</a>
    <a href="index.php?c=Usuarios&m=vistaModificar">✏️Modificar Datos</a>
    <a href="index.php?c=Usuarios&m=cerrarSesion">🚪Cerrar sesión</a>
</body>
</html>