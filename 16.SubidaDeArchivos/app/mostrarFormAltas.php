<?php
    require_once('controllers/cMinijuegos.php');
    $objControlador = new CMinijuegos();
    $ambitos = $objControlador->mostrarFormuAdd();
    include_once($objControlador->vista);
?>