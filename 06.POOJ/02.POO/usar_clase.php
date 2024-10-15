<?php
    require_once "mes.php";

    $date=$_GET["date"];/*Obtiene la fecha enviada a través del formulario*/

    $objMes = new Mes($date); 

    echo $objMes -> convertir_fecha();

    echo $objMes -> diasMes();

?>