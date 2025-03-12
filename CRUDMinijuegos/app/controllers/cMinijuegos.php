<?php

    class CMinijuegos{

        public $vista;
        public $objModelo;

        public function __construct() {
            require_once('models/mMinijuegos.php');
            $this->objModelo = new MMinijuegos();
        }

        public function inicio(){
            $this->vista = 'views/vistaPrincipal.php';
            $minijuegos = $this->objModelo->obtenerMinijuegos();
            return $minijuegos;
        }

        public function formModificar($idMinijuego){
            $this->vista = 'views/vistaModificar.php';
            $minijuego = $this->objModelo->obtenerMinijuegoAmbitos($idMinijuego);
            $ambitos = $this->objModelo->obtenerAmbitos();
            $data = [
                'minijuegos' => $minijuego,
                'ambitos' => $ambitos
            ];
            include($this->vista);
        }
    }
?>