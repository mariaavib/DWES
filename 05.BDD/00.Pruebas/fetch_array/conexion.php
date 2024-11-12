<?php
    require_once("./datosConexion.php");

    /*Conectamos al servidor de base de datos*/

    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    /*Comprobar el error de a ultima conexion*/

    $mysqli->connect_errno;   
    $mysqli->connect_error; 

    /*Realizar una consulta a la base de datos*/

    $consulta = "SELECT * FROM alumnos";
    $resultado = $mysqli->query($consulta);

    /*echo $resultado ->num_rows;*/
    $fila = $resultado ->fetch_array();

    while($fila = $resultado ->fetch_array()){
        foreach($fila as $indice => $valor){
            echo $indice;
            echo $valor;
            echo '<br>';
        }
        
        echo '<hr>';
    }
   
   
	$mysqli->close();

?>