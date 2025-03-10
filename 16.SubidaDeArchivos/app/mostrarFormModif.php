<?php
    require_once('controllers/cMinijuegos.php');
    $id = $_GET['idMinijuego'];
    $objControlador = new CMinijuegos();
    $minijuego = $objControlador->mostrarFormuModif($id);
    include_once($objControlador->vista);
?>