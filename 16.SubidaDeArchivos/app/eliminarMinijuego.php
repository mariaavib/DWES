<?php
    require_once('controllers/cMinijuegos.php');
    $id = $_GET['idMinijuego'];
    $objControlador = new CMinijuegos();
    $ambitos = $objControlador->eliminarMinijuego($id);
?>