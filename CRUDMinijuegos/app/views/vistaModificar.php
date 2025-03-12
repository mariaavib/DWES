<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
</head>
<body>
    <?php
       // print_r($data);
    ?>
    <form action="" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $data['minijuegos']['nombre']; ?>">

        <label for="ambito">Ámbito: </label><br>
        <?php
            // Mostrar los checkboxes para los ámbitos
            foreach($data['ambitos'] as $ambito){
                // Verificar si el ámbito actual está seleccionado
                $checked = '';
                if ($ambito['idAmbito'] == $data['minijuegos']['idAmbito']) {
                    $checked = 'checked'; // Si está seleccionado, marcar el checkbox
                }
                echo '<input type="checkbox" name="ambito[]" value="'.$ambito['idAmbito'].'"'.$checked.'>'.$ambito['nombre'].'<br>';
            }
        ?>
        <input type="submit" value="Modificar">
    </form>
</body>
</html>
