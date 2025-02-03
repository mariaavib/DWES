<?php
    //Recoger datos
    $ambitosRecogidos = [];
    if(isset($_POST["ambitos"])){
        for($i=0;$i<count($_POST["ambitos"]);$i++){
                $ambitosRecogidos[] = $_POST["ambitos"][$i];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recoger datos</title>
</head>
<body>
    <?php
        //Mostrar ambitos seleccionados
        if(count($ambitosRecogidos) > 0) {
            for($i=0; $i<count($ambitosRecogidos); $i++){
                echo "<p>Ámbito: ".$ambitosRecogidos[$i]."</p>";
            }        
        }else{
            echo "<p>No se seleccionaron ámbitos.</p>";
        }       
    ?>
</body>
</html>