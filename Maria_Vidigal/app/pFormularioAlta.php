<?php
    require_once('controlador/cPreguntas.php');
    $objControlador = new CPreguntas();
    $objControlador->mostrarFormulario();
    //include_once('views/vFormAlta.php');
    include_once($objControlador->vista);
?>