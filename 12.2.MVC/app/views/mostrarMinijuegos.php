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
        <?php 
            //Recorre cada elemento del array $datos, $valor es el valor que hay dentro de $datos que es un array asociativo y los indices son ambito y minijuegos
            foreach ($datos as $valor){
                echo '<h2>'.$valor["ambito"].': </h2>';
                echo '<ul>';
                //Este recorre cada elemento del array $valor['minijuegos'] y muestra el $valor2 que es el nombre del minijuego
                foreach ($valor["minijuegos"] as $valor2){
                    echo '<li>'.$valor2.'</li>';
                } 
                echo '</ul>';
            } 
         ?>
        <a href="index.php">VOLVER</a>
    </div>
    
</body>
</html>