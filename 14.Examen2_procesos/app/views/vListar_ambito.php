<!-- Vista principal que lista los ambitos -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>
    <a href="formulario_alta.php">Añadir Minijuego</a>
    <ul>
        <?php
            foreach($ambitos as $ambito){
                echo '<li>'.$ambito['nombre'].'</li>';
                echo '<a href="formulario_modificar.php?id='.$ambito['idambito'].'">Editar</a>';
            }
        ?>
    </ul>
</body>
</html>