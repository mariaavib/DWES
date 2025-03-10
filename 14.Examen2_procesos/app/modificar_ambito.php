<?php
    //Proceso para modificar el nombre del ambito
    require_once('controllers/cMinijuegos.php');

    $id = $_POST['idambito'];
    $nombre = $_POST['nombre'];
    
    $objCMinijuegos = new CMinijuego();
    $objCMinijuegos->modificarAmbito($id, $nombre);
?>