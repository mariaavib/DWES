<?php
    require_once('conexion.php');
    $minijuegos = [];
    if(isset($_POST["ambitos"])){
        foreach ($_POST["ambitos"] as $idAmbito) {
            $sql = "SELECT nombre FROM ambitos WHERE idAmbito = '$idAmbito';";
            $resultado = mysqli_query($sql. $conexion);
            while($ambito = mysqli_fetch_array($resultado)){//Recorre cada fila del resultado de la consulta
                echo 'Ámbito seleccionado: ' .$ambito['nombre'].'<br>';

                $sql2 = "SELECT nombre FROM minijuegos WHERE idAmbito = '$idAmbito';";
                $resultado2 = mysqli_query($conexion, $sql2);
                while($minijuego = mysqli_fetch_array($resultado2)){
                    echo 'Minijuego: '.$minijuego['nombre'].'<br>';
                }
            } 

        }
    }

?>
