<?php 
    $num = $_GET["num"];

    function comprobar($num){
        if($num % 2 == 0)
            header("Location:par.php?numPar=$num");
        else    
            header("Location:impar.php?numImpar=$num");
    }

    comprobar($num);
?>