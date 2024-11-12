<?php
    $imagenes = array(
        "clavel" => './img/clavel.jpg',
        "margarita" => './img/margarita.jpg',
        "petunia" => './img/petunia.jpg',
    );
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Array Asociativo</title>
</head>
<body>
    <?php
        foreach ($imagenes as $nombre => $enlace) {
            echo '<p>'.$nombre.'</p>';
            echo '<img src='.$enlace.'>';
        }
    ?>
</body>
</html>