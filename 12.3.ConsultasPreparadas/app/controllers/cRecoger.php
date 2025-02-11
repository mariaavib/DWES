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

            if (isset($_POST["nombAmbito"]) && !empty($_POST["nombAmbito"])){
                $datos = $this->objModelo->recogerAmbitos($_POST["nombAmbito"]);
                return $datos;
            }else{
                echo "Completa todos los campos";
                return false;
            }
        }
        
    }
?>