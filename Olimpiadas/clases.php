<?php
    require_once("conexion.php");
    
    $sql = 'SELECT DISTINCT idClase FROM alumnos;';

    try {
        $resultado = $conexion->query($sql);
        $clases = [];

        while ($fila = $resultado->fetch_assoc()) {
            $clases[] = $fila;  
        }
        
        echo json_encode($clases);  
    } catch (mysqli_sql_exception $e) {
        echo json_encode(['error' => 'error']);
    }
    exit();
?>
