<?php
    $rutaCarpeta = 'archivos/';
    $filename = $_FILES["archivo"]["name"]; //Nombre original del archivo
    $rutaTemp = $_FILES["archivo"]["tmp_name"]; //Ruta temporal del archivo

    // Mover el archivo a la carpeta de destino
    if (move_uploaded_file($rutaTemp, $rutaCarpeta . $filename)) {
        echo "Archivo subido correctamente";
    } else {
        echo "No se ha podido subir";
    }

    // Ruta de la carpeta donde se guardarán los archivos
    $rutaCarpeta = 'archivos/';

    // Verificar si se ha enviado un archivo
    if (isset($_FILES["archivo"])) {
        $filename = $_FILES["archivo"]["name"]; //Nombre original del archivo
        $rutaTemp = $_FILES["archivo"]["tmp_name"]; //Ruta temporal del archivo
        $tamañoArchivo = $_FILES["archivo"]["size"]; //Tamaño del archivo en bytes
        $error = $_FILES["archivo"]["error"]; // Error de subida

        // Verificar si no se seleccionó ningún archivo
        if ($tamañoArchivo == 0) {
            echo "No se ha seleccionado ningún archivo.";
            return false;
        }

        // Verificar el tipo MIME
        $tipoArchivo = $_FILES["archivo"]["type"]; 
        
        // Definir los tipos 
        $tiposPermitidos = ['image/jpeg', 'image/png'];
        
        // Comprobar si el tipo MIME es válido
        if (!in_array($tipoArchivo, $tiposPermitidos)) {
            echo "Solo se permiten archivos JPEG o PNG.";
            return false;
        }

        // Intentar mover el archivo a la carpeta de destino
        if (move_uploaded_file($rutaTemp, $rutaCarpeta . $filename)) {
            echo "Archivo subido correctamente.";
        } else {
            echo "Hubo un error al subir el archivo.";
        }

    } else {
        echo "No se ha enviado ningún archivo.";
        return false;
    }
?>
