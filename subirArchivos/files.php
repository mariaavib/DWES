<?php
    $rutaCarpeta = 'archivos/';
    $filename = $_FILES["archivo"]["name"]; //Nombre original del archivo
    $rutaTemp = $_FILES["archivo"]["tmp_name"]; //Ruta temporal del archivo

    if(move_uploaded_file($rutaTemp, $rutaCarpeta . $filename)){
        echo "Archivo subido correctamente";
    }else{
        echo "No se ha podido subir";
    }

?>
<?php
    // Ruta de la carpeta donde se guardarán los archivos
    $rutaCarpeta = 'archivos/';

    // Verificar si se ha enviado un archivo
    if (isset($_FILES["archivo"])) {
        $filename = $_FILES["archivo"]["name"]; // Nombre original del archivo
        $rutaTemp = $_FILES["archivo"]["tmp_name"]; // Ruta temporal del archivo
        $tamañoArchivo = $_FILES["archivo"]["size"]; // Tamaño del archivo en bytes
        $error = $_FILES["archivo"]["error"]; // Error de subida

        // Verificar si no se seleccionó ningún archivo
        if ($tamañoArchivo == 0) {
            echo "No se ha seleccionado ningún archivo.";
            exit;
        }

        // Limitar el tamaño del archivo (por ejemplo, 2MB)
        $tamañoMaximo = 2 * 1024 * 1024; // 2MB en bytes
        if ($tamañoArchivo > $tamañoMaximo) {
            echo "El archivo excede el tamaño máximo permitido (2MB).";
            exit;
        }

        // Verificar el tipo de archivo (por ejemplo, solo permitir imágenes JPEG y PNG)
        $tipoArchivo = mime_content_type($rutaTemp);
        if ($tipoArchivo != 'image/jpeg' && $tipoArchivo != 'image/png') {
            echo "Solo se permiten archivos JPEG o PNG.";
            exit;
        }

        // Intentar mover el archivo a la carpeta de destino
        if (move_uploaded_file($rutaTemp, $rutaCarpeta . $filename)) {
            echo "Archivo subido correctamente.";
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    } else {
        echo "No se ha enviado ningún archivo.";
    }
?>
