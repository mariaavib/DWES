<?php
    require_once('./conexion.php');

    //Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasenia = $_POST['contrasenia'];
    $rool = $_POST['rool'];

    //Consulta para insertar los datos en la tabla Administradores
    $sql = "INSERT INTO Administradores (nombre, correo, contrasenia, rool) VALUES ('$nombre', '$correo', '$contrasenia', '$rool')";
    
    if ($conexion->query($sql) === TRUE) {
        echo "Usuario creado correctamente.<br>";

        $crearUsuario = "CREATE USER '$nombre'@'localhost' IDENTIFIED BY '$contrasenia';";
        if ($rool == 'admin') {
            $crearUsuario .= "GRANT ALL PRIVILEGES ON *.* TO '$nombre'@'localhost' WITH GRANT OPTION;";
        }else{
            $crearUsuario .="GRANT SELECT, INSERT, UPDATE, DELETE ON libros.* TO '$nombre'@'localhost';";
        }
        $crearUsuario .= "FLUSH PRIVILEGES;";
        //Ejecutar la consulta para crear el usuario con privilegios
        if($conexion->multi_query($crearUsuario)){
            echo "Usuario administrador creado correctamente.<br>";

            //Eliminar el archivo de instalación si el usuario se crea correctamente
            if(unlink("instalacion.php")) {
                echo "Archivo de instalación eliminado correctamente.<br>";
            }else{
                echo "No se pudo eliminar el archivo correctamente.<br>";
            }

        }else{
            echo "Error al crear el usuario administrador";
        }
    }else {
        echo "Error no se pudo crear el usuario en la tabla Administradores <br>";
    }

    $conexion->close();
?>                                  