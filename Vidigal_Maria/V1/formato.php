<?php
    class Formato{
        private $datos;
        public function __construct() {}

        public function apellidoNombre($nombre,$apellidos){
            //guardo en una variable el formato en el que quiero que se visualicen
            $this->datos = $apellidos.', '.$nombre;
            return strlen($this->datos).'<br>'.$this->datos.'<br>';  
        }

        public function nombreApellidos($nombre,$apellidos){
            $this->datos = $nombre.' '.$apellidos;
            return strlen($this->datos).'<br>'.$this->datos.'<br>';
        }
    }
    
?>