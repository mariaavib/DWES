<?php
    require_once("./datosConexion.php");
 
    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    $consulta = 'DELETE FROM alumnos WHERE idAlumnos='.$_POST["id"].';';
        
    $resultado = $mysqli->query($consulta);

    if($resultado){
      echo "Alumno borrado correctamente";
    }else{
      echo "Error";
    }
    $mysqli->close();

?>