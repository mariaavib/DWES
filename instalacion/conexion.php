<?php
    require_once("configdb.php");

    /*Conectamos al servidor de base de datos*/
    $conexion = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }
    
    $conexion -> set_charset("utf8");
    $controlador = new mysqli_driver();
    $controlador -> report_mode = MYSQLI_REPORT_OFF;
?>