<?php
    /*---CREACIÓN DE ARRAYS---*/

    /*ARRAYS INDEXADOS | [ÍNDICES NUMÉRICOS]*/
        
        $colores = array(
            0=>"azul",
            1=>"naranja",
            2=>"verde"
        );

        $colores = array ("azul", "naranja", "verde");

        $colores[3] = "rojo";
        $colores[] = "negro"; 	// Se añade en la siguiente posición del array
    
    /*ARRAYS ASOCIATIVOS | [ÍNDICES NO NUMÉRICOS]*/

        $datos["nombre"] = "María Fernández";
        $datos ["telefono"] ="644123456";

        $datos = array(
            "nombre"=>" María Fernández ",
            "telefono "=>"644123456"
        );

    /*---RECORRER ARRAY---*/
        
        print_r($datos); //Muestra todo el contenido a la vez  
            echo "<br>"

        foreach ($datos as $indice => $valor) //Recorriendo el array con un foreach
            echo "<b>".$indice ."</b> tiene el valor ". $valor;
        
        foreach($datos as $valor) //Abreviado para mostrar solo el valor
            echo $valor;
            
?>