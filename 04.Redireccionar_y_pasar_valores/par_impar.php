<?php
    $num = $_GET["num"];
    $cuadrado = 0;

    if(parImpar($num,$cuadrado)){
        header("Location:par.php?numPar=$num&cuadrado=$cuadrado");
    }else{
        header("Location:impar.php?numImpar=$num&cuadrado=$cuadrado");
    }
    /*Funcion para saber si el numero es par o no es par*/
    function parImpar ($num,&$cuadrado)
    {
        $cuadrado = $num*$num;
        if($num%2==0){
            return true;
        }else{
            return false;
        }
    }
?>