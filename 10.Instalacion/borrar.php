<?php
/**Borrar carpeta instalacion */
    $carpeta = "instalacion";
    foreach(glob($carpeta . "/*") as $archivos_carpeta){
        if (is_dir($archivos_carpeta)){
            rmDir_rf($archivos_carpeta);
        } else {
            unlink($archivos_carpeta);
        }
    }
    rmdir($carpeta);
    header("Location: http://localhost/DWES%20GIT/DWES/10.Instalacion/appLibros/formularioV2.php");
    exit();
?>