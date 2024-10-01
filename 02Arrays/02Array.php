<?php

/*Programa una página que guarde en un array los factoriales del 0 al 10. 
Posteriormente se mostrarán en una tabla (html), los números y su factorial.*/

require_once("./01Factorial.php");

//Mostrar el numero y los factoriales
for($i=0;$i<=10;$i++){
    $factoriales[$i] = factorial($i); //Creo un array en el que guardamos el resultado de la funcion llamada factorial
}

//print_r($factoriales); //Muestra el resultado por pantalla

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio Factorial</title>

    <style>
        h1{
            text-align: center;
        }
        table{
            width: 50%;
            margin:0 auto;
            border-collapse: collapse;
            background-color:#fff8e1;
            font-size:1.2vw;
            text-align:center;
            
        }
        th{
            background-color:#ffe491 ;
            font-size:1.4vw;
        }
        table,th,td{
            border: solid 1px #000;
        }
    </style>
</head>
<body>
        <h1>Factorial</h1>
    <table>
        <tr>
            <th>Numero</th>
            <th>Factorial</th>
        </tr>
        <?php
            /*Bucle para hacer dinámico el html*/
            for($i=0;$i<=10;$i++){
                echo "<tr><td>".$i."</td><td>".$factoriales[$i]."</td></tr>" ; /*con ayuda de php enviamos las etiquetas para crear las celdas de la tabla que contendran el valor de las variables asignadas*/
            }
             
        ?>
    </table>
</body>
</html>
