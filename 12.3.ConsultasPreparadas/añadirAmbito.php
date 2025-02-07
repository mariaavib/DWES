<?php
    $numAmbitos = $_POST["numAmbitos"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="recogerAmbitos.php" method="post">
        <?php
            for($i=0;$i<$numAmbitos;$i++){
                echo '<label for="nombAmbito">Nombre del Ambito:';
                echo '<input type="text" name="nombAmbito[]">';
                echo '<br>';
            }
        ?>
        <input type="submit">
    </form>
</body>
</html>