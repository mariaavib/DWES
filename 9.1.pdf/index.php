
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mainMenu.css">
</head>
<body>
    
    <section  class="irish-grover-regular" id="rankingCard">
        <h2>Ranking</h2>
        <table class="tabla-ranking"  style="color:black !important;">
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Nombre</th>
                    <th>Puntuación</th>
                </tr>
            </thead>
            <tbody>
            <?php   
                require_once 'ranking.php';
                    // Variable para llevar el conteo de la posición
                    $posicion = 1;

                    // Recorrer los datos y mostrar en la tabla
                    foreach ($datos as $jugador) {
                        echo "<tr>";
                        // Imprimir la posición, nombre y puntuación
                        echo "<td>".$posicion."</td>";
                        echo "<td>".$jugador['nombreRegistro']."</td>";
                        echo "<td>".$jugador['barraPuntuacion']."</td>";
                        echo "</tr>";
                        $posicion++;  // Aumentar la posición en el ranking
                    }
                ?>
            </tbody>
        </table>
        <a href="pdf.php" class="pdf">Ir al pdf</a>
    </section>
</body>
</html>