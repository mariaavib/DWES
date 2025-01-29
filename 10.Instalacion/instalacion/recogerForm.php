<?php
    require_once('./conexion.php');
  
    //Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    //Consulta para insertar los datos en la tabla Administradores
    $sql = "INSERT INTO Administradores (nombre, correo, contrasenia) VALUES ('$nombre', '$correo', '$contrasenia')";
    
    if ($conexion->query($sql) === TRUE) {

        echo "Usuario creado correctamente.<br>";     
        //Ejecutar la consulta para crear el usuario con privilegios
        header("Location: http://localhost/DWES_git/DWES/10.Instalacion/appLibros/formularioV2.php");

        //Tengo que borrar toda la carpeta instalacion y el borrar.php lo tengo que tener fuera de la carpeta instalacion                                      
        if(unlink("instalacion.php")) {
            echo "Archivo de instalación eliminado correctamente.<br>";
        }else{
            echo "No se pudo eliminar el archivo correctamente.<br>";
        }

    }else {
        echo "Error no se pudo crear el usuario en la tabla Administradores<br>";
    }

    $conexion->close();
?>         