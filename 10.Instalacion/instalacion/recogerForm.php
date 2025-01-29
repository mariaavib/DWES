<?php
    require_once('./conexion.php');
  
    //Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];

    //Consulta para insertar los datos en la tabla Administradores
    $sql = "INSERT INTO Administradores (nombre, correo, contrasenia) VALUES ('$nombre', '$correo', '$contrasenia');";

    if ($conexion->query($sql)) {

        echo "Usuario creado correctamente.<br>";     
        //Ejecutar la consulta para crear el usuario con privilegios
        header("Location: https://20.2daw.esvirgua.com/10.InstalacionServidor/appLibros/formularioV2.php");
        exit();
        
    }else {
        echo "Error no se pudo crear el usuario en la tabla Administradores<br>";
    }

    $conexion->close();
?>