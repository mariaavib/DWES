<!-- Vista para añadir un minijuego -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altas minijuegos</title>
</head>
<body>
    <h2>Datos del minijuego</h2>
    <form action="alta_minijuegos.php" method="post">
        <label for="nombre">Nombre del juego: </label>
        <input type="text" name="nombre" id="nombre">
        <select name="ambito" id="ambito">
        <?php
            foreach($ambitos as $ambito){
                echo '<option value="'.$ambito['idambito'].'">'.$ambito['nombre'].'</option>';
            }
        ?>   
        <label for="clase">Recomendado para: </label>
        <input type="checkbox" name="eso" id="eso">ESO
        <input type="checkbox" name="ciclos" id="ciclos">ciclos
        <input type="checkbox" name="bachillerato" id="bachillerato">bachillerato
        <input type="submit" value="Enviar">
    </form>
</body>
</html>