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
            // Guardar el minijuego en una cookie 
            setcookie("minijuego_nombre", $_GET['nombre'], time() + 60);
            setcookie("minijuego_url", $_GET['url'], time() + 60);

            $this->vista = 'minijuegoSeleccionado';
            return true;
        }
    }
?>