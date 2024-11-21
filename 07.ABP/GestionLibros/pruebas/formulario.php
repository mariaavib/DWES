<?php
    require_once("./datosConexion.php");
    $mysqli = new mysqli($servidor, $usuario, $contraseña, $basedatos);

    /*if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }

    $consulta = "SELECT idCurso,nombre FROM cursos";
    $resultado=$mysqli->query($consulta);

    if ($resultado) {
        for ($i = 1; $fila = $resultado->fetch_array(); $i++) {
            $idCurso[$i] = $fila["idCurso"];
            $nombre[$i] = $fila["nombre"];
        }
    } else {
        die("Error en la consulta: " . $mysqli->error);
    }*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de libros</title>
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
    <main>
        <form action="gestionLibros.html" method="POST">
            <h2>Gestionar libros</h2>
            <select name="clases" id="clases">
            <option value="" disabled selected>Seleccione un curso</option>
                <?php
                    for($i=1;$i<=count($idCurso);$i++)
                        echo '<option value="'.$idCurso[$i].'">'.$nombre[$i].'</option>';
                ?>
            </select>
            <input type="submit" value="Enviar">
        </form>
    </main>
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