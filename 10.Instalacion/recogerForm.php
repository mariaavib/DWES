<?php
    require_once('./conexion.php');

    //Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];


    //Consulta para insertar los datos en la tabla Administradores
    $sql = "INSERT INTO Administradores (nombre, correo, contrasenia) VALUES ('$nombre', '$correo', '$contrasenia')";
    
    if ($conexion->query($sql) === TRUE) {
        echo "Usuario creado exitosamente.";
    } else {
        echo "Error no se ha podido crear el usuario";
    }

    $conexion->close();
?>
