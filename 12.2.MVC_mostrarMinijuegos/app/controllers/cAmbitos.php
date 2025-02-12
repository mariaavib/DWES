<?php
    class CAmbitos{
        public $objModelo;
        public $vista;
        public $errores = [];

        public function __construct() {
            require_once(RUTA_MODELOS.'Ambitos.php');
            $this->objModelo = new MAmbitos();
        }

        public function inicio(){
            $this->vista = 'formulario';
            $datos =  $this-> objModelo -> cogerAmbitos();    
            return $datos;
        }

        public function mostrar(){
            $this->vista = 'mostrarMinijuegos';

            if(!isset($_POST['terminos'])){
                $this->errores[] = "Debes aceptar los términos";
            }

            if(!isset($_POST['ambitos'])){
                $this->errores[] = "Debes seleccionar al menos un ámbito";
            }

            if(!empty($this->errores)){
                $this->vista = 'formulario';
                $datos = $this -> objModelo -> cogerAmbitos();
                return ['errores' => $this->errores, 'datos' => $datos];
            }

            $datos = $this -> objModelo -> cogerMinijuegos($_POST['ambitos']);
            return $datos;
        }
    }
?>