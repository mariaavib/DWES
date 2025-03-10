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