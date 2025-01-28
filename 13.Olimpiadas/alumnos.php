<?php
    require_once("conexion.php");
    
    $sql = 'SELECT nombre FROM alumnos WHERE idClase="'.$_GET['clase'].'";';

    try {
        $resultado = $conexion->query($sql);
        $datos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }

        echo json_encode($datos);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }

    exit();
?>
