<?php
    require_once("./formato.php");

    //Recoger informacion del formulario con issets y empty
    if(!empty($_POST["nombre"]))
        $nombre = $_POST["nombre"];
    if(!empty($_POST["apellidos"]))
        $apellidos = $_POST["apellidos"];
    if(isset($_POST["formato"]))
        $formato = $_POST["formato"];
    if(isset($_POST["provincia"]))
        $provincia = $_POST["provincia"];

    //crear el objeto de la clase
    $objFormato =  New Formato(); 
    
    if($formato == 'apellidoNombre'){
        echo $objFormato->apellidoNombre($nombre,$apellidos);
    }else{
        echo $objFormato->nombreApellidos($nombre,$apellidos);
    }
    echo $provincia;
  
?>