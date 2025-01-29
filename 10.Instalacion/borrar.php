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
    header("Location: https://20.2daw.esvirgua.com/10.InstalacionServidor/appLibros/formularioV2.php");
    exit();
?>