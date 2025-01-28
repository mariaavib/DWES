<?php
    require_once("./config_db.php");
    
    try {
        $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);
        //Consulta para insertar un libro
        $consulta = 'INSERT INTO libros (isbn, nombre, precio, idEditorial, idAsignatura) VALUES("'.$_POST["isbn"].'", "'.$_POST["nombre"].'", "'.$_POST["precio"].'", "'.$_POST["idEditorial"].'", "'.$_POST["idAsignatura"].'");';
        /*Ejecutar la consulta*/
        $resultado = $mysqli->query($consulta);

        if(!$resultado){
            throw new Exception("Error de registro ". $mysqli->error);
        } else {
             header("Location:formularioV2.php");
        }
        
    } catch(Exception $e) {
        echo $e->getMessage();
    }
    $mysqli->close();
?>