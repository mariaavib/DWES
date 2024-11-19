<?php
    require_once("./formatoV2.php");

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
    $objFormato =  New Formato($nombre,$apellidos); 
    //acceder a la variable publica de la clase
    echo $objFormato->caracteres.'<br>';
    
    if($formato == 'apellidoNombre'){
        echo $objFormato->apellidoNombre().'<br>';
    }else{
        echo $objFormato->nombreApellidos().'<br>';
    }
    echo $provincia;
  
?>