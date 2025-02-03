<?php
require_once("conexion.php");

$ambitosRecogidos = [];
$minijuegos = [];


//Mostrar los nombres de los ámbitos seleccionados y sus minijuegos
if (isset($_POST["ambitos"])){
    foreach ($_POST["ambitos"] as $idAmbito){
        $sql = "SELECT nombre FROM ambitos WHERE idAmbito = '$idAmbito'";
        $resultado = mysqli_query($conexion, $sql);
        while($ambito = mysqli_fetch_array($resultado)){
            echo "Ámbito seleccionado: " . $ambito['nombre'] . "<br>";

            //Minijuegos correspondientes al ámbito
            $sqlMinijuegos = "SELECT nombre FROM minijuegos WHERE idAmbito = '$idAmbito'";
            $resultadoMinijuegos = mysqli_query($conexion, $sqlMinijuegos);
            while ($minijuego = mysqli_fetch_array($resultadoMinijuegos)){
                echo "Minijuego: " . $minijuego['nombre'] . "<br>";
            }
        }
    }
}

?>
