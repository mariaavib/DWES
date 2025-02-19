<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="index.php?c=Recoger&m=add"  method="post">
        <?php
            if ($dato['errores']) {
                foreach ($errores as $error) {
                    echo "<p style='color: red;'>" . $error . "</p>";
                }
            }

            if($datos=='c'){
                echo 'Insertado correctamente';
            }else{
                if($datos=='incorrecto'){
                    for($i=0;$i<$datos;$i++){
                        echo '<label for="nombAmbito">Nombre del Ambito:';
                        echo '<input type="text" name="nombAmbito[]">';
                        echo '<br>';
                    }
                }else{
                    for($i=0;$i<$datos;$i++){
                        echo '<label for="nombAmbito">Nombre del Ambito:';
                        echo '<input type="text" name="nombAmbito[]">';
                        echo '<br>';
                    }
                }
            }
        ?>
        <input type="submit">
    </form>
</body>
</html>