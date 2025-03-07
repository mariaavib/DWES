<?php
    class CMinijuego{
        public $vista;
        public $objModelo;

        public function __construct(){
            require_once('models/mMinijuegos.php');
            $this->objModelo = new MMinijuegos();
        }

        public function listar_ambitos(){
            $this->vista = 'views/vListar_ambito.php';
            $ambitos = $this->objModelo->obtenerAmbitos();
            return $ambitos;
        }

        public function mostrarFormulario(){
            $this->vista = 'views/modificar.php';
            $this->objModelo->mostrarDatosAmbito();
        }
    }
?>