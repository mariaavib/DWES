<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambitos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Selecciona los ambitos</h1>
    <form action="index.php?c=Ambitos&m=mostrar" method="post" onsubmit="return validarFormulario()">
        <?php
            //Recorre cada elemento del array $datos
            foreach ($datos as $indice => $valor) {
                echo '<input type="checkbox" name="ambitos[]" value="'.$valor['idAmbito'].'">'.$valor['nombre'].'<br>';
            }           
        ?>
        <input type="checkbox" name="terminos" id="terminos"><strong>Acepta los términos</strong>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>