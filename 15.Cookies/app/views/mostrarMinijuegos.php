<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Minijuegos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>  
    <div>
        <h2>Minijuego seleccionado anteriormente</h2>
        <?php
            if (isset($_COOKIE["minijuego_nombre"]) && isset($_COOKIE["minijuego_url"])) {
                echo '<p><strong>' . $_COOKIE["minijuego_nombre"] . '</strong></p>';
            }
        ?>
    </div>
    <br>
    <div>
        <?php 
            //Recorre cada elemento del array $datos, $valor es el valor que hay dentro de $datos que es un array asociativo y los indices son ambito y minijuegos
            foreach ($datos as $indice => $valor){
                echo '<h2>'.$indice.': </h2>';
                echo '<ul>';
                if(empty($valor)){
                    echo '<li>No hay minijuegos para este ámbito.</li>';
                } else {
                    //Este recorre cada elemento del array $valor['minijuegos'] y muestra el $valor2 que es el nombre del minijuego
                    // print_r($valor);
                    foreach ($valor as $valor2){
                        echo '<a href="index.php?c=Ambitos&m=minijuegoSeleccionado&url='.$valor2["urlMinijuego"].'&nombre='.$valor2["nombreMinijuego"].'" id="nombreMinijuego">';
                        echo $valor2["nombreMinijuego"];         
                    } 
                }
                echo '</ul>';
            } 
         ?>
        <a href="index.php" id="volver">VOLVER</a>
    </div>
</body>
</html>