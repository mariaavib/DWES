<?php
    //Proceso para añadir minijuego
    require_once('controllers/cMinijuegos.php');

    $nombre = $_POST['nombre'];

    // Comprobar si el nombre existe
    $objCMinijuegos = new CMinijuego();
    $existe = $objCMinijuegos->comprobarNombreMinijuego($nombre);

    //Si el nombre existe muestra un mensaje y si no llama al metodo del controlador para añadirlo
    if ($existe) {
        echo "El nombre del minijuego ya está registrado.";
    } else {
        $objCMinijuegos->alta_minijuego($nombre);
    }
?>