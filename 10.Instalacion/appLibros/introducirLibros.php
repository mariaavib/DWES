<?php
    require_once("./procedimientoscopy.php");
    $objProcedimientos = new Procedimientos('localhost', 'root', '', 'applibros');
    $editoriales = $objProcedimientos->obtenerEditoriales();
    $asignaturas = $objProcedimientos->obtenerAsignaturas();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir libros</title>
    <link rel="stylesheet" href="styleLibros.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.html">
                <img src="./resources/logo.png" alt="Logo">
            </a>
        </div>
        <nav>
            <a href="../../pages/admin/gestionStock.html">Gestión Stock</a>
            <a href="../../pages/admin/listaReservas.html">Gestión Reservas</a>
            <a href="../../pages/admin/gestionLibros.html">Gestión Libros</a>
        </nav>
        <div class="icono-usuario">
            <a href="login.html">
                <img src="./resources/login.png" alt="login">
            </a>
        </div>
    </header>
    <form action="./introducirL.php" method="post" class="formAñadir">
        <legend>Introducir datos del libro</legend>
        <ol>
            <li>
                <label for="isbn">ISBN: </label>
                <input type="text" name="isbn"/>
            </li>
            <li>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre"/>
            </li>
            <li>
                <label for="precio">Precio: </label>
                <input type="text" name="precio"/>
            </li>
            <li>
                <label for="idEditorial">Editorial: </label>
                <select name="idEditorial" id="nombreEdit">
                    <option value="" disabled selected>Seleccione una editorial</option>
                    <?php
                        for($i=1;$i<=count($objProcedimientos->idEditorial);$i++)
                        echo '<option value="'.$objProcedimientos->idEditorial[$i].'">'.$objProcedimientos->nombreEdit[$i].'</option>';
                    ?>
                </select>
            </li>
            <li>
                <label for="idAsignatura">Asignatura: </label>
                <select name="idAsignatura" id="nombreAsign">
                    <option value="" disabled selected>Seleccione una asignatura</option>
                    <?php
                        for($i=1;$i<=count($objProcedimientos->idAsignatura);$i++)
                        echo '<option value="'.$objProcedimientos->idAsignatura[$i].'">'.$objProcedimientos->nombreAsign[$i].'</option>';
                    ?>
                </select>
            </li>
        </ol>   
        <input type="reset" value="Cancelar"/>
        <input type="submit" value="Enviar"/>
    </form>
    <footer>
        <div class="colaboradores">
            <b>Colaboradores</b>
            <p><a href="https://atabalfundacion.wordpress.com/">Fundacion Atabal</a></p>
            <p><a href="https://www.aytobadajoz.es/es/ayto/portada">Ayto. Badajoz</a></p>
            <p><a href="https://www.aexpainba-fmm.org/comienzo.asp">AEXPAINBA</a></p>
            <p><a href="http://www.fidesbancaetica.com/">FIDES</a></p>
        </div>
        <div class="cita">
            <p>"El examen de conciencia es siempre el mejor medio para cuidar bien el alma."</p>
            <p>"San Ignacio de Loyola"</p>
        </div>
        <div class="contacto">
            <b id="contactar">Contactar</b>
            <p><i class="fas fa-map-marker-alt"></i> C/ Corte de Peleas, 79 06009 Badajoz</p>
            <p><i class="fas fa-phone"></i> +34 924 25 17 61</p>
        </div>
    </footer>
</body>
</html>