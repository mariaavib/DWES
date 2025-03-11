<?php
// Usando el nombre de la máquina del cliente
    require_once('controllers/cMinijuegos.php');
    $id = $_GET['idMinijuego'];
    $objControlador = new CMinijuegos();
    $minijuego = $objControlador->mostrarFormuModif($id);
    include_once($objControlador->vista);
?>