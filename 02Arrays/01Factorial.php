<?php
/*Funcion para calcular el factorial*/
    function factorial ($numero)
    {
        $factorial=1;
        for($i=$numero;$i>=1;$i--){
            $factorial=$factorial * $i;
        }
        return $factorial;
    }
?>
