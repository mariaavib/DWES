<?php
    //Proceso para gestionar los minijuegos
    require_once('controllers/cMinijuegos.php');
    $objControlador = new CMinijuegos();
    //Llamar al metodo del controlador
    $minijuegos = $objControlador->gestMinijuegos();
    include_once($objControlador->vista);
?>