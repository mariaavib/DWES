<?php
    require_once("./calcularV2.php");
    
    $objCalcular = new Calcular();

    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    $sig = $_GET["signo"];

    $objCalcular->cambiar($num1,$num2);

    switch($sig){
        case '+':
            echo ($objCalcular->sumar($num1,$num2));
            break;
        case '-';
            echo ($objCalcular->restar($num1,$num2));
            break;
        case '*':
            echo ($objCalcular->multiplicar($num1,$num2));
            break;
        case '/':
            echo ($objCalcular->dividir($num1,$num2));
            break;
        default:
            echo "ERROR";
    }
?>