<?php
    require_once("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario ambito</title>
</head>
<body>
    <form action="recogerForm.phh" method="POST">
        <?php
            foreach ($ambitos as $indice => $valor) {
                echo "<input type='checkbox' name='ambitos[]' value='".$ambito['idAmbito']."'>".$ambito['nombre']."<br>";
            }
        ?>
    </form>
</body>
</html> 