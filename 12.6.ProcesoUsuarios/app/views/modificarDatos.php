<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modificar Datos</title>
</head>
<body>
    <div class="container">
        <h2>Modificar Datos</h2>

        <?php
        if (!empty($errores)) {
            echo '<div class="errores">';
            foreach ($errores as $error) {
                echo '<p class="error">' . $error . '</p>';
            }
            echo '</div>';
        }
        ?>

        <form action="index.php?c=Usuarios&m=modificarDatos" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre']''; ?>">

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo $_SESSION['correo']''; ?>">

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $_SESSION['telefono']  ''; ?>">

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
