<?php
    class CRecoger{
        public $objModelo;
        public $vista;
        public $errores = [];//Array para guardar los errores

        public function __construct() {
            require_once(RUTA_MODELOS.'Recoger.php');
            $this->objModelo = new MRecoger();
        }

        //Metodo predeterminado que establece la vista principal
        public function predeterminado(){
            $this->vista = 'numAmbitos';
            return true; 
        }

        //Metodo para manejar la validación del número de ámbitos
        public function numAmbitos() {
            $this->vista = 'addAmbito';
        
            // Validación del campo numAmbitos
            if (isset($_POST["numAmbitos"]) && is_numeric($_POST["numAmbitos"]) && $_POST["numAmbitos"] > 0) {
                return (int)$_POST["numAmbitos"];  //Si pasa la validación devuelve el número
            } else {
                //Si no pasa la validación se generan los errores y se retorna
                $this->vista = 'numAmbitos';
                $this->errores[] = "Ingresa un número válido de ámbitos.";// Agrega un mensaje de error al array errores
                return ["errores" => $this->errores]; //Enviar errores a la vista
            }
        }
        
        //Metodo para menjar el añadir ámbitos
        public function add(){
            $this->vista = 'addAmbito';
        
            if (isset($_POST["nombAmbito"])) {
                $nombres = $_POST["nombAmbito"]; // Guarda los nombres de los ámbitos del formulario
                $nombresIntroducido = [];//Array para almacenar los nombres de ámbitos corregidos
                $nombresVistos = [];// Array para verificar nombres de ámbitos duplicados
        
                foreach ($nombres as $nombre) {
                    $nombreCorregido = trim($nombre);// Elimina espacios en blanco al inicio y al final del nombre
        
                    if ($nombreCorregido === '') {
                        $this->errores[] = "Error: Completa todos los campos.";// Agrega un mensaje de error si el campo está vacío
                    } else
                        if (isset($nombresVistos[$nombreCorregido])) {
                            $this->errores[] = "Error: No se pueden ingresar nombres de ámbito repetidos en el formulario.";// Agrega un mensaje de error si el campo está vacío
                        } else {
                            $nombresVistos[$nombreCorregido] = true; //Marca el nombre como visto
                            $nombresIntroducido[] = $nombreCorregido; // Agrega el nombre corregido al array de nombres introducidos 
                    }
                }
        
                if (!empty($this->errores)) {
                    return ["errores" => $this->errores]; // Enviar errores a la vista
                }
        
                foreach ($nombresIntroducido as $nombre) {
                    if ($this->objModelo->existeAmbito($nombre)) {
                        $this->errores[] = "Error: El ámbito '$nombre' ya existe en la base de datos.";// Agrega un mensaje de error si el campo está vacío
                    }
                }
        
                if (!empty($this->errores)) {
                    return ["errores" => $this->errores]; // Enviar errores a la vista
                }
        
                $datos = $this->objModelo->recogerAmbitos($nombresIntroducido);
                return $datos;
            }
            // Si no se recibieron datos del formulario almacenar el error y devolverlo
            $this->errores[] = "Error: No se recibieron datos del formulario.";
            return ["errores" => $this->errores];
        }
    }
?>
