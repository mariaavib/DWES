<?php
    require_once("./config_db.php");
    try {
        $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);
        $consulta = 'DELETE FROM libros WHERE isbn="'.$_GET["isbn"].'";';
        $resultado = $mysqli->query($consulta);

        if(!$resultado){
            throw new Exception("Error");
        }else{
            echo "Libro borrado correctamente";
        }
    } catch (Exception $th) {
        $resultado=$th;
    }
    header("'Location:gestionLibros.php?".$_GET["clases"]."'");
?>