<?php
    $nombre = $_POST["nombre"];
    $contrasenia = $_POST["contrasenia"];
    if(isset($_POST["preocupacion"]))
        $preocupacion = $_POST["preocupacion"];
    if(isset($_POST["fenomenos"])){
        for($i=0;$i<count($_POST["fenomenos"]);$i++)
            $fenomenos[] =$_POST["fenomenos"][$i];
    }    
    $descripcion = $_POST["descripcion"];
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