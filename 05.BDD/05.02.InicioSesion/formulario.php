<?php
    require_once("./datosConexion.php");

    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

        $consulta = 'SELECT usuario FROM usuario WHERE'.' usuario = "'.$_POST["usuario"].'"AND contrasenia = "'.$_POST["contrasenia"].'";';
        echo $consulta;
        $resultado = $mysqli -> query($consulta);

        $fila = $resultado->fetch_assoc();

        if($resultado->num_rows >0){
            echo "Has iniciado sesion";
        }else{
            echo "Datos incorrectos";
        }   

?>