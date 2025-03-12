<?php
    require_once('controllers/cMinijuegos.php');
    $objControlador = new CMinijuegos();
    $minijuegos = $objControlador->inicio();
    include_once('views/vistaPrincipal.php');
?>