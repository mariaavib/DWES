<?php

    require_once("./funcion.php");

    //Array que fuarda los factoriales
    for($i=0;$i<=10;$i++){
        $factoriales[$i] = factorial($i); 
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio Factorial</title>
</head>
<body>
        <h1>Factorial</h1>
        <?php
        
            /*for($i=0;$i<count($factoriales);$i++){
                echo "<p><a href='./verFactorial.php?factorial=".$factoriales[$i]."'>".$i."</a></p>";
            } */

           foreach($factoriales as $indice => $valor)
                echo "<p><a href='verFactorial.php?factorial=".$valor."'>".$indice."</a></p>";
        ?>
</body>
</html>