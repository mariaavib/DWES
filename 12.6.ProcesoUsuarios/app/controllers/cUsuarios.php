<?php
    class CUsuarios{
        public $objModelo;
        public $vista;

        public function __construct(){
            require_once(RUTA_MODELOS.'Usuarios.php'); 
            $this->objModelo = new MUsuarios();
        }

        public function inicio(){
            $this->vista = 'inicio'; 
            
        }
    }
?>