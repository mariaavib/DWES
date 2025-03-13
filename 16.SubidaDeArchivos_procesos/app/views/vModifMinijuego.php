<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modificar Minijuego</title>
</head>
<body>
    <?php
        //print_r($data);
    ?>
    <form action="modificarMinijuego.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['minijuego']['idMinijuego']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $data['minijuego']['nombre']; ?>"><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen"><br>
        <select name="idAmbito" id="idAmbito">
            <?php
                echo '<option value="'.$data['ambitos']['idAmbito'].' selected">'.$data['minijuego']['nombreAmbito'] . '</option>';
                foreach($data['ambitos'] as $ambito){
                    echo '<option value="'.$ambito['idAmbito'].'">'.$ambito['nombre'].'</option>';
                }    
            ?>
        </select>
        <!-- Mostrar la imagen actual -->
        <?php 
            if (!empty($minijuego['imagen'])) {
                echo '<p>Imagen actual: <img src="'.$minijuego['imagen'].'"alt="Imagen del Minijuego" width="100"></p>';
            }
        ?>
        <input type="submit" value="Modificar">
        <a href="gestion_minijuegos.php" class="volver">Volver</a>
    </form>
</body>
</html>