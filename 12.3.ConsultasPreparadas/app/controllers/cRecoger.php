<?php
    class CRecoger{
        public $objModelo;
        public $vista;
        public $errores = [];//Array para guardar los errores

        public function __construct() {
            require_once(RUTA_MODELOS.'Recoger.php');
            $this->objModelo = new MRecoger();
        }

        public function predeterminado(){
            $this->vista = 'numAmbitos';
            return true; 
        }

        public function numAmbitos(){
            $this->vista = 'addAmbito';
            //Validar que se ha introducido valor en el formulario
            if (isset($_POST["numAmbitos"]) && $_POST["numAmbitos"] > 0){
                $numAmbitos = $_POST["numAmbitos"];
                return $numAmbitos; 
            }else{
                $this->vista = 'numAmbitos';
                echo "Ingresa un número válido de ámbitos.";
                return false;
            }
        }

        public function add(){
            $this->vista = 'addAmbito';
    
            if (isset($_POST["nombAmbito"])) {
                $nombres = $_POST["nombAmbito"];
                $nombresIntroducido = []; //Array para guardar los nombres introducidos por el usuario, sin que esten repetidos
                $nombresVistos = []; //Para verificar duplicados
    
                //Eliminar espacios en blanco al inicio y final de cada nombre
                foreach ($nombres as $nombre) {
                    $nombreCorregido = trim($nombre);
    
                    //Validar si el campo está vacío
                    if ($nombreCorregido === '') {
                        $this->errores[] = "Error: Completa todos los campos.";
                        return 'incorrecto';
                    }
    
                    if (isset($nombresVistos[$nombreCorregido])) {
                        $this->errores[] = "Error: No se pueden ingresar nombres de ámbito repetidos en el formulario.";
                        return 'incorrecto';
                    }
    
                    //Guardar el nombre en los arrays auxiliares
                    $nombresVistos[$nombreCorregido] = true;
                    $nombresIntroducido[] = $nombreCorregido;
                }
    
                //Validar que no existan en la base de datos
                foreach ($nombresIntroducido as $nombre) {
                    if ($this->objModelo->existeAmbito($nombre)) {
                        $this->errores[] = "Error: El ámbito '$nombre' ya existe en la base de datos.";
                        return 'incorrecto';
                    }
                }
    
                $datos = $this->objModelo->recogerAmbitos($nombresIntroducido);
                return $datos;
            }
        }
    }
?>