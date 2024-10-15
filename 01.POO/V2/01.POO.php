<?php
    require_once("./calcular.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio Basico</title>
</head>
<body>
    <form action="" method="GET">
        <label for="num1">Numero 1: </label>
        <input type="text" name="num1"> 
        <label for="text">Signo: </label>
        <input type="text" name="signo">
        <label for="num2">Numero 2: </label>
        <input type="number" name="num2">
        <label for="=">=</label>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<?php
    $objCalcular = new Calcular();
                
    $n1 = $_GET["num1"];
    $n2 = $_GET["num2"];
            
    $sig = $_GET["signo"];

    switch($sig){
        case '+':
            $resultado = $objCalcular->sumar($n1,$n2);
            break;
        case '-';
            $resultado = $objCalcular->restar($n1,$n2);
            break;
        case '*':
            $resultado = $objCalcular->multiplicar($n1,$n2);
            break;
        case '/':
            $resultado = $objCalcular->dividir($n1,$n2);
            break;
        default:
            $resultado = "ERROR";
        }
            
        echo '<input type="text" name="result" value="'.$resultado;
?>


