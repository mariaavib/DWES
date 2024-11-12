<?php
    require_once("./fecha.php");

    $objFecha = new Fecha($_POST["fecha"]);

    echo '<p>'.$objFecha -> mostrar().'</p>';
    echo '<p>'.$objFecha -> dias().'</p>';
    
?>