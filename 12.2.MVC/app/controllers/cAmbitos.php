<?php
    class CAmbitos{
        public $objModelo;
        public $vista;

        public function __construct() {
            require_once(RUTA_MODELOS.'Ambitos.php');
            $this->objModelo = new MAmbitos();
        }

        public function inicio(){
            $this->vista = 'formulario';
            return $this-> objModelo -> cogerAmbitos();    
        }

        public function mostrar(){
            $this->vista = 'mostrarMinijuegos';
            return $this -> objModelo -> cogerMinijuegos($_POST['ambitos']);
        }
    }
?>