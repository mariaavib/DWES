<?php
    require_once("./procedimientoscopy.php");
    $objProcedimientos = new Procedimientos('localhost', 'root', '', 'applibros');
    if(isset($_GET['cusoSelct']))
        $objProcedimientos->cursoSeleccionado = $_GET['cusoSelct'];
    $datos = $objProcedimientos->librosPorCurso();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de libros</title>
    <link rel="stylesheet" href="./styleLibros.css">
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
        <div class="titulo-y-controles">
            <button class="añadir" onclick="window.location.href='./introducirLibros.php'">+</button>
            <h2 class="tituloTotalLibros">Total de Libros</h2>
            <button class="filtrar">Filtrar</button>
            <button class="ordenar">Ordenar</button>
        </div>
        <table class="tablaLibros" >
            <tr>
                <th>ISBN</th>
                <th>Título</th>
                <th>Clase</th>
                <th>Activo</th>
                <th>Modificar</th>
                <th>Eliminar</th>
             </tr>
                <?php
                    echo '<h1 class="titCurso">'.$objProcedimientos->cursoSeleccionado.'</h1>'; 
                    if(!empty($datos)){
                        while ($fila = $datos->fetch_assoc()) { 
                            echo $fila["ISBN"].$fila["titulo"].$fila["idCurso"].' '.$fila["letraClase"];
                            echo '<tr><td>'.$fila["ISBN"].'</td>';
                            echo '<td>'.$fila["titulo"].'</td>';
                            echo '<td>'.$fila["idCurso"].' '.$fila["letraClase"].'</td>';
                            if($fila["activo"] == 0){
                                    echo '<td>NO</td>';
                            }else{
                                    echo '<td>SI</td>';
                            }
                            echo '<td><button id="modificar">Modificar</button></td>';
                            echo '<td><a id="eliminar" href="./borrar.php?isbn=' . $fila["ISBN"] . '&cusoSelct=' . $objProcedimientos->cursoSeleccionado . '">Eliminar</a></td></tr>';
                        } 
                    }else{
                        echo '<p class="noLibros">No existen libros para el curso '.$objProcedimientos->cursoSeleccionado.'</p>';   
                    }
                ?>
        </table>
        <a href="./formularioV2.php" class="volver">Volver</a>
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