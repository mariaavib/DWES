<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion Get Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php?c=Usuarios&m=inicioSesion" method="post">
        <div>
            <?php
                if (is_array($datos) && isset($datos['errores'])) {
                    echo '<div class="errores">';
                    // Recorre el array y muestra los errores
                    foreach ($datos['errores'] as $error) {
                        echo '<p class="error">'.$error.'</p>';
                    }
                }
                echo '</div>';
            ?>
        </div>
        <label for="correo">Correo: </label>
        <input type="text" name="correo" id="email">
        <label for="passw">Contraseña: </label>
        <input type="password" name="passw" id="passw">
        
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>