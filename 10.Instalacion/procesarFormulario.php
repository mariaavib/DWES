<?php
    require_once('./conexion.php');

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];
    $sql = "INSERT INTO Administradores (nombre, correo, contrasenia) VALUES ('$nombre', '$correo', '$contrasenia')";
    
    if ($conexion->query($sql) === TRUE) {
        echo "Usuario administrador creado correctamente.";
    } else {
        echo "Error al crear el usuario administrador: ";
    }
    $conexion->close();
  
?>
