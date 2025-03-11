<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Añadir Minijuego</title>
</head>
<body>
    <form action="altaMinijuego.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre">
        <label for="ambito">Ambito: </label>
        <select name="idAmbito" id="idAmbito">
            <?php
                // Cargar los ámbitos disponibles desde la base de datos
                foreach ($ambitos as $ambito) {
                    echo '<option value="' . $ambito['idAmbito'] . '">' . $ambito['nombre'] . '</option>';
                }
            ?>
        </select><br>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen"><br>
        <input type="submit" value="Enviar">
        <a href="gestion_minijuegos.php">Volver</a>
    </form>
    <!-- <?php
        // Mostrar el mensaje de error si el formulario no está completo
  
        if (empty($_POST['nombre']) || empty($_POST['idAmbito']) || empty($_FILES['imagen']['name'])) {
            echo "<p style='color:red;'>No estan rellenos todos los campos obligatorios.</p>";
            echo "<a href='altaMinijuego.php'>Volver</a>"; 
        }
    ?> -->
</body>
</html>