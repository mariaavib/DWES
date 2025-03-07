<?php
    require_once ('controllers/cMinijuegos.php');
    $objCMinijuegos = new CMinijuego();
    $ambitos = $objCMinijuegos->listar_ambitos();
    include_once($objCMinijuegos->vista);
?>