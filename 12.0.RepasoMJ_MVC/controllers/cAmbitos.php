<?php
    class CAmbitos{
        private $objModelo;
        public $vistas;

        function __construct(){
            require_once(RUTA_MODELOS.'Ambitos.php');
            $this->objModelo = new MAmbitos();
        }

        public function inicio(){
            $this->vistas = 'formulario';
            $datos = $this -> objModelo -> extraer();
            return $datos;
        }
    }
?>