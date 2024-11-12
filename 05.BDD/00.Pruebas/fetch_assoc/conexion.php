<?php
    require_once("./datosConexion.php");

    /*Conectamos al servidor de base de datos*/

    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    /*Comprobar el error de a ultima conexion*/

    $mysqli->connect_errno;   
    $mysqli->connect_error; 

    /*Realizar una consulta a la base de datos*/

    $consulta = "SELECT count(*) FROM alumnos";
    $resultado = $mysqli->query($consulta);

    /*echo $resultado ->num_rows;*/
    $fila = $resultado ->fetch_assoc();

    echo 'Mostrar con print_r <br>';
    print_r($fila);
    echo '<hr>';
    echo 'Mostrar con var_dump <br>';
    var_dump($fila); 
	$mysqli->close();

?>