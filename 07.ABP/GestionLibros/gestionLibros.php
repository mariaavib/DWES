<?php
    require_once("./procedimientos.php");
    $objProcedimientos = new Procedimientos('localhost', 'root', '', 'applibros');
    $objProcedimientos->librosPorCurso();
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
        <div class="titulo-y-controles">
            <button class="añadir">+</button>
            <h2 class="tituloTotalLibros">Total de Libros</h2>
            <button class="filtrar">Filtrar</button>
            <button class="ordenar">Ordenar</button>
        </div>
        <table class="tablaLibros" >0
            <tr>
                <th>ISBN</th>
                <th>Título</th>
                <th>Clase</th>
                <th>Activo</th>
                <th>Modificar</th>
                <th>Eliminar</th>
             </tr>
                <?php 
                    for ($i=0; $i < count($objProcedimientos->isbn); $i++) { 
                       echo '<tr><td>'.$objProcedimientos->isbn[$i].'</td>';
                       echo '<td>'.$objProcedimientos->titulo[$i].'</td>';
                       echo '<td>'.$objProcedimientos->clases[$i].'</td>';
                       if($objProcedimientos->activo[$i] == 0){
                            echo '<td>NO</td>';
                       }else{
                            echo '<td>SI</td>';
                       }
                       echo '<td><button id="modificar">Modificar</button></td>';
                       echo '<td><button id="eliminar" onclick="borrar()">Eliminar</button></td></tr>';
                    }  
                ?>
                <script>
                    window.location.href = '$objProcedimientos->borrar()';
                </script>
        </table>
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