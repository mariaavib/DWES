<?php
    require_once('app/config/config.php');

    if(!isset($_GET['c'])){
        $_GET['c'] = CONTROLADOR_DEF;
    }

    if(!isset($_GET['m'])){
        $_GET['m'] = METODO_DEF;
    }

    $rutaControlador = RUTA_CONTROLLERS.$_GET['c'].'.php';
    require_once($rutaControlador);

    $controlador = 'C'.$_GET['c'];
    $objControlador = new $controlador();
    $datos = [];

    if(method_exists($controlador,$_GET['m'])){
        $datos = $objControlador->{$_GET['m']}();
    }

    require_once(RUTA_VIEWS.$objControlador->vista);
?>