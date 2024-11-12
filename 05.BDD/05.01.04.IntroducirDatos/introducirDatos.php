<?php
    require_once("./datosConexion.php");
 
    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    try{
        $consulta = 'INSERT INTO alumnos (nombre,apellidos,email) VALUES("'.$_POST["nombre"].'","'.$_POST["apellidos"].'","'.$_POST["email"].'");';
        
        if($mysqli->query($consulta)){
            echo "Registro hecho correctamente";
        }else{
            throw new Exception ("Error de registro ". $mysqli->error);
        }
        $msqli->close();
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>