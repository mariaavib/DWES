<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php?c=Usuario&m=cambiarPassw" method="POST">
        <label for="correo">Correo:</label>
        <?php
            echo '<input type="email" id="correo" name="correo" value="'.$_SESSION['correo'].'" readonly>';
        ?>
        <label for="passwAntigua">Contraseña Actual:</label>
        <input type="password" id="passwAntigua" name="passwAntigua">
        
        <label for="nuevaPassw">Nueva Contraseña:</label>
        <input type="password" id="nuevaPassw" name="nuevaPassw">
        
        <button type="submit">Cambiar Contraseña</button>
    </form>
</body>
</html>