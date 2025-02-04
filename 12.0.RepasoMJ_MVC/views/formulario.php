<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario ambito</title>
</head>
<body>
    <form action="recogerForm.php" method="POST">
        <h1>Selecciona los ambitos que quieras: </h1>
        <?php
            foreach ($datos as $indice => $valor) {
                echo "<input type='checkbox' name='ambitos[]' value='".$valor["idAmbito"]."'>".$valor["nombre"]."<br>";
            }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>