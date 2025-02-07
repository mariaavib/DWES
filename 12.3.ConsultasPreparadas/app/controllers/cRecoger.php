<?php
    class CAmbitos{
        public $objModelo;
        public $vista;

        public function __construct() {
            require_once(RUTA_MODELOS.'Recoger.php');
            $this->objModelo = new MRecoger();
        }

        public function numAmbitos(){
            $this->vista = 'numAmbitos';
            $datos = $this-> objModelo -> numAmbitos($_POST["nombAmbito"]);   
            return $datos; 
        }

        public function añadir(){
            $this->vista = 'añadirAmbito';
            $datos =  $this-> objModelo -> recogerAmbitos($_POST["nombAmbito"]);    
            return $datos;
        }

    }
?>