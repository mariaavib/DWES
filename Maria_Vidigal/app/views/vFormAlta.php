<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Alta Pregunta</title>
</head>
<body>
    <form action="pInsertarPregunta.php" method="POST" enctype="multipart/form-data">
    <label for="num">Numero de pregunta</label><br>
    <input type="text" name="num" id="num"><br>
        <label for="textoPregunta">Texto</label><br>
        <input type="text" name="textoPregunta" id="textoPregunta"><br>
        <label for="imagen">Imagen</label><br>
        <input type="file" name="imagen" id="imagen"><br>
        <label for="respuestas[]">Respuestas: </label><br>
        <!-- Para poder saber cual es cada respuesta la pongo como clave en el array -->
        <label for="respuestaA">Respuesta A: </label>
        <input type="text" name="respuestas[A]" id="respuestas1"><br>
        <label for="respuestaA">Respuesta B: </label>
        <input type="text" name="respuestas[B]" id="respuestas2"><br>
        <label for="respuestaA">Respuesta C: </label>
        <input type="text" name="respuestas[C]" id="respuestas3"><br>
        <label for="respuestaA">Respuesta D: </label>
        <input type="text" name="respuestas[D]" id="respuestas4"><br>
        <label for="letra">Letra respuesta correcta: </label><br>
        <input type="text" name="letra" id="letra"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>