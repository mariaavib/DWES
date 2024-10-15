<?php
    require_once("./calcular.php");
    
    $objCalcular = new Calcular();
    
    $n1 = $_GET["num1"];
    $n2 = $_GET["num2"];
    
    $sig = $_GET["signo"];

    switch($sig){
        case '+':
            echo ($objCalcular->sumar($n1,$n2));
            break;
        case '-';
            echo ($objCalcular->restar($n1,$n2));
            break;
        case '*':
            echo ($objCalcular->multiplicar($n1,$n2));
            break;
        case '/':
            echo ($objCalcular->dividir($n1,$n2));
            break;
        default:
            echo "ERROR";
    }


?>