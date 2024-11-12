<?php
    $texto = $_POST["texto"];
    $nombre = $_POST["nombres"];
    $eleccion = $_POST["eleccion"];
    $eleccionR = $_POST["eleccionR"];

    echo '<p>'.$texto.'</p><br>';
    echo '<p>'.$nombre.'</p><br>';
    if(!empty($eleccion)){
        for ($i=0; $i <count($eleccion) ; $i++) { 
            echo '<p>'.$eleccion[$i].'</p>';
        }
    }
    echo '<p>'.$eleccionR.'</p>';
?>