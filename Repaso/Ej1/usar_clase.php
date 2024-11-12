<?php
    require_once("./calcular.php");

    $objCalcular = new Calcular($_GET["num1"], $_GET["num2"]);
    //guardamos el signo
    $sig = $_GET["signo"];

    //creamos el switch y le pasamos el signo
    switch($sig){
        case '+':
            echo('Resultado: '.$objCalcular->sumar());
            break;
        case '-':
            echo('Resultado: '.$objCalcular->restar());
            break;
        case '*':
            echo('Resultado: '.$objCalcular->multiplicar());
            break;
        case '/':
            echo('Resultado: '.$objCalcular->dividir());
            break;
        default:
            echo("ERROR");
    }
?>