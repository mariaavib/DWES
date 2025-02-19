<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario Inicio Sesion</title>
</head>
<body>
    <form action="index.php?c=Usuarios&m=inicio" method="post">
        <label for="email">Correo: </label>
        <input type="text" name="email" id="email">
        <label for="passw">Contraseña: </label>
        <input type="password" name="passw" id="passw">
        
        <button type="submit">Iniciar Sesión</button>
        <?php
            if($datos){
                echo "Has iniciado sesion correctamente";
            }else{
                echo "Error";
            }
        ?>
    </form>
</body>
</html>