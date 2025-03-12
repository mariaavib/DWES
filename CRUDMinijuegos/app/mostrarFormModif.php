<?php
    require_once('controllers/cMinijuegos.php');
    $objControlador = new CMinijuegos();
    $idMinijuego = $_GET['id'];
    $objControlador->formModificar($idMinijuego);
    include_once('views/vistaModificar.php');
?>