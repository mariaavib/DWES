<?php
    $nombre = $_GET["nombre"];
    $contrasenia = $_GET["contrasenia"];
    if(isset($_GET["preocupacion"]))
        $preocupacion = $_GET["preocupacion"];
    if(isset($_GET["fenomenos"])){
        for($i=0;$i<count($_GET["fenomenos"]);$i++)
            $fenomenos[] =$_GET["fenomenos"][$i];
    }    
    $descripcion = $_GET["descripcion"];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Recoger datos</title>
</head>
<body>
    <?php
        if(!empty($nombre))
            echo "<p>Nombre: ".$nombre."</p>";
        if(!empty($contrasenia))
            echo "<p>Contrasenia: ".$contrasenia."</p>";
        if(isset($preocupacion))
            echo "<p>Preocupacion: ".$preocupacion."</p>";
        if(isset($fenomenos))
            for($i=0;$i<count($fenomenos);$i++)
                echo "<p>Fenomeno: ".$fenomenos[$i]."</p>";
        if(!empty($descripcion))
            echo "<p>Descripcion: ".$descripcion."</p>";
    ?>
</body>
</html>