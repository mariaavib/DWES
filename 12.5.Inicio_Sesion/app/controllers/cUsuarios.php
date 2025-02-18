<?php
    class CUsuario{
        public $objModelo;
        public $vista;

        public function __construct(){
            require_once(RUTA_MODELOS.'Usuarios.php');
            $this->objModelo = new MUsuarios();
        }

        public function inicio(){
            $this->vista = 'formulario';
            $datos = $this -> objModelo -> inicioUsuario();
            return $datos;
        }
    }
?>