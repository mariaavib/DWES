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
            if(empty($valor)){
                echo '<li>No hay minijuegos para este ámbito.</li>';
            }else{
                //Recorre cada elemento del array $datos, $valor es el valor que hay dentro de $datos que es un array asociativo y los indices son ambito y minijuegos
                foreach ($datos as $indice => $valor){
                    echo '<h2>'.$indice.': </h2>';
                    //Este recorre cada elemento del array $valor['minijuegos'] y muestra el $valor2 que es el nombre del minijuego
                    foreach ($valor as $valor2){
                        echo '<li>'.$valor2.'</li>';
                    } 
                }
            }
         ?>
        <a href="index.php">VOLVER</a>
    </div>
    
</body>
</html> 