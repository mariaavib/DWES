<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Conexion</title>
    <link rel="stylesheet" hrefe="style.css">
</head>
<body>
    <table>
    <?php
        require_once("./datosConexion.php");
        $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

        /*Comprobar el error de a ultima conexion*/
    
        $mysqli->connect_errno;   
        $mysqli->connect_error; 
    
        /*Realizar una consulta a la base de datos*/
    
        $consulta = "SELECT nombre,email FROM alumnos";
        $resultado = $mysqli->query($consulta);
    
        /*echo $resultado ->num_rows;*/
        
            while ($fila = $resultado ->fetch_array()){
                echo '<tr><td>'.$fila["nombre"].'</td>'; 
                echo '<td>'. $fila["email"].'<td></tr>';
            }
    ?>
    </table>
</body>
</html>
