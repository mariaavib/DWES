<?php
    require_once "fecha.php";

    /*Recoger la fecha enviada en el formulario*/
    $fecha = $_GET["fecha"];

    /*Instanciamos el objeto*/
    $objMes = New Fecha($fecha);

    echo  $objMes -> convertir_fecha();
    echo  $objMes -> mostrar();
?>