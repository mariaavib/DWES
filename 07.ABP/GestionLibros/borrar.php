<?php
    require_once("./config_db.php");
    try {
        $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);
        /*Consulta para borrar libros*/
        $consulta = 'DELETE FROM libros WHERE isbn="'.$_GET["isbn"].'";';
        /*Ejecutar la consulta*/
        $resultado = $mysqli->query($consulta);

        /*Si no existe mandar una excepcion */
        if(!$resultado){
            throw new Exception("Error");
        }else{
            header("'Location:gestionLibros.php?".$_GET["clases"]."'");
        }
    } catch (Exception $th) {
        $resultado=$th;
    }
?>