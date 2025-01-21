<?php
    require_once("conexion.php");
    
    $sql = 'SELECT COUNT(*) AS numPruebas FROM pruebas;';
    $sql2 = 'SELECT nombre FROM pruebas;';


    try {
        $resultado = $conexion->query($sql);
        $fila = $resultado->fetch_assoc();

        $resultado2 = $conexion->query($sql2);
        $datos = []; 
        while ( $fila2 = $resultado2->fetch_assoc()) {
           $datos[] = $fila2['nombre'];
        }
        $respuesta = [
            'numPruebas' => $fila['numPruebas'],
            'nombres' => $datos
        ];

        echo json_encode($respuesta); 

    } catch (mysqli_sql_exception $e) {
        echo json_encode(['error' => 'error']);
    }
    exit();
?>
