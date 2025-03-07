<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>
<body>
    <a href="">Añadir Ámbito</a>
    <ul>
        <?php
            foreach($ambitos as $ambito){
                echo '<li>'.$ambito['nombre'].'</li>';
            }
        ?>
    </ul>
</body>
</html>