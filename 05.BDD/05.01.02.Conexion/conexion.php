<?php
    require_once("./datosConexion.php");

    /*Conectamos al servidor de base de datos*/

    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    /*Comprobar el error de a ultima conexion*/

    $mysqli->connect_errno;   
    $mysqli->connect_error; 

    /*Realizar una consulta a la base de datos*/

    $consulta = "SELECT nombre,email FROM alumnos";
    $resultado = $mysqli->query($consulta);

    /*echo $resultado ->num_rows;*/

    while ($fila = $resultado ->fetch_array()){
        echo $fila["nombre"]; 
        echo $fila["email"];
    }

    /*Comprobar el error de la última de la última función llamada*/

	/*$mysqli->errno;  Devuelve el código del error de la última función llamada.*/
    /*$mysqli->error;  Devuelve una cadena que describe el error de la última función llamada.*/

    /*Extrae una fila del resultado de la consulta (método del objeto mysqli_result)*/

	/* */

    /*Comprobar las filas que devuelve  la consulta (propiedad del objeto mysqli_result)*/

    
    /*Cerrar la conexión establecida*/
	$mysqli->close();

?>