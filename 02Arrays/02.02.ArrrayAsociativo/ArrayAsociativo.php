<?php
    $imagenes = array(
        "Naranjo" => "./img/naranjo.jpg",
        "Limonero" => "./img/limonero.jpg",
        "Eucalipto" => "./img/eucalipto.jpg",
        "Almendro" => "./img/almendro.jpg"
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arboles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php

        foreach($imagenes as $nombre => $enlace){
            echo "<div>";
            echo "<img src='$enlace' alt='$nombre'>";
            echo "<p>".$nombre."</p>";
            echo "</div>";
        }     
    ?>
</body>
</html>