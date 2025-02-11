<?php
    class CRecoger{
        public $objModelo;
        public $vista;

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
            //***Podria validar que sea un numero
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

            if (isset($_POST["nombAmbito"])){
                foreach($_POST["nombAmbito"] as $valor){
                    //Trim quita los espacios
                    if(trim($valor)==''){
                        echo "Completa todos los campos";
                        return 'incorrecto';
                    }
                }
                $datos = $this->objModelo->recogerAmbitos($_POST["nombAmbito"]);
                return $datos;
            }
        }
        
    }
?>