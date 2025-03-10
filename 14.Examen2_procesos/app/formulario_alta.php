<?php
    //Proceso para mostrar el formulario de altas
    require_once('controllers/cMinijuegos.php');
    $objCMinijuegos = new CMinijuego();
    $ambitos = $objCMinijuegos->mostrarFormularioAltas();
    include_once($objCMinijuegos->vista);
?>
