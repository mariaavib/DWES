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
            $datos = $this-> objModelo -> cogerAmbitos();    

            return $datos;   
        }

        public function mostrar(){
            $this->vista = 'mostrarMinijuegos';            
            $datos = $this -> objModelo -> cogerMinijuegos($_POST['ambitos']);

            return $datos;
        }
    }
?>