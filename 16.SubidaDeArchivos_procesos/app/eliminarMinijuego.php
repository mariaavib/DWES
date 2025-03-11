<?php
// Usando el nombre de la máquina del cliente
    require_once('controllers/cMinijuegos.php');
    $id = $_GET['idMinijuego'];
    $objControlador = new CMinijuegos();
    $ambitos = $objControlador->eliminarMinijuego($id);
?>