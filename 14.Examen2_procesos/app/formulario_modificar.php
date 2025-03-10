<?php
    //Proceso para obtener los datos par el formulario modificar
    require_once ('controllers/cMinijuegos.php');
    $id = $_GET['id'];
    $objCMinijuegos = new CMinijuego();
    $ambito = $objCMinijuegos->mostrarFormulario($id);
    include_once($objCMinijuegos->vista);
?>