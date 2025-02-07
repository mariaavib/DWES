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
            $numAmbitos = $_POST["numAmbitos"];
            return $numAmbitos; 
        }

        public function add(){
            $this->vista = 'addAmbito';
            $datos =  $this-> objModelo -> recogerAmbitos($_POST["nombAmbito"]);    
            return $datos;
        }

    }
?>