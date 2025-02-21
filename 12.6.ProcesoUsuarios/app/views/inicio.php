<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario Inicio Sesion</title>
</head>
<body>
    <form action="index.php?c=Usuarios&m=inicioSesion" method="post">
        <label for="correo">Correo: </label>
        <input type="text" name="correo" id="email">
        <label for="passw">Contraseña: </label>
        <input type="password" name="passw" id="passw">
        
        <button type="submit">Iniciar Sesión</button>
    </form>
    <div>
        <?php
            if (is_array($datos) && isset($datos['errores'])) {
                echo '<div class="errores"><ul>';
                // Recorre cada error y lo muestra 
                foreach ($datos['errores'] as $error) {
                    echo '<p class="error">'.$error.'</p>';
                }
            }
            echo '</ul></div>';
        ?>
    </div>
</body>
</html>