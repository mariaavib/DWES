<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>Cambiar Contraseña</h2>
    <?php
        // Si hay errores, los mostramos
        if (!empty($errores)) {
            echo '<div class="errores">';
            foreach ($errores as $error) {
                echo '<p class="error">' . $error . '</p>';
            }
            echo '</div>';
        }
        ?>
        <form action="index.php?c=Usuarios&m=cambiarPassw" method="POST">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="<?php echo isset($_SESSION['correo']) ? $_SESSION['correo'] : ''; ?>" readonly>
            
            <label for="passwAntigua">Contraseña Actual:</label>
            <input type="password" id="passwAntigua" name="passwAntigua">
            
            <label for="nuevaPassw">Nueva Contraseña:</label>
            <input type="password" id="nuevaPassw" name="nuevaPassw">
            
            <button type="submit">Cambiar Contraseña</button>
        </form>

    </div>
</body>
</html>