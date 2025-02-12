<?php
    class CAmbitos{
        public $objModelo;
        public $vista;

        public function __construct() {
            require_once(RUTA_MODELOS.'Ambitos.php');
            $this->objModelo = new MAmbitos();
        }

        //Vista principal que envia al modelo
        public function inicio(){
            $this->vista = 'formulario';
            $datos =  $this-> objModelo -> cogerAmbitos();    
            return $datos;
        }

        //Vista que envia al modelo y le pasa como parametro un array
        public function mostrar(){
            $this->vista = 'mostrarMinijuegos';
            $datos = $this -> objModelo -> cogerMinijuegos($_POST['ambitos']);
            return $datos;
        }

        //Vista que muestra el minijuego seleccionado, no es necesario enviar a la vista
        public function minijuegoSeleccionado(){
            $this->vista = 'minijuegoSeleccionado';
            return true;
        }
    }
?>