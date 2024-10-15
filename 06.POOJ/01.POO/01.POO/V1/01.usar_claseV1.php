<?php
    require_once("./calcularV1.php");
    
    $objCalcular = new Calcular($_GET["num1"],$_GET["num2"]);
    $sig = $_GET["signo"];

    switch($sig){
        case '+':
            echo ($objCalcular->sumar());
            break;
        case '-';
            echo ($objCalcular->restar());
            break;
        case '*':
            echo ($objCalcular->multiplicar());
            break;
        case '/':
            echo ($objCalcular->dividir());
            break;
        default:
            echo "ERROR";
    }


?>