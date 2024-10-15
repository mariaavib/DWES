<?php
    require_once "mes.php";

    $date=$_GET["date"];

    $objMes = new Mes($date); 

    echo $objMes -> convertir_fecha();

    echo $objMes -> diasMes();

?>